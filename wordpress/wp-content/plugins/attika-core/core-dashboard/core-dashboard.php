<?php

if(!class_exists('AttikaCoreDashboard')){

	class AttikaCoreDashboard {

		private static $instance;

		private $sub_pages = array();
		private $validation_url = 'https://api.qodeinteractive.com/purchase-code-validation.php';
		public	$licence_field = 'attika_purchase_info';
		public	$import_field = 'attika_import_params';

		public static function get_instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct() {

			add_action('admin_menu', array(&$this, 'register_sub_pages'));
			add_action('wp_enqueue_scripts', array(&$this, 'enqueue_styles'));
			add_action('admin_menu', array(&$this, 'dashboard_add_page'));
			add_action('admin_init', array(&$this, 'page_welcome_redirect'));
			add_action( 'attika_mikado_action_core_on_activate', array(&$this, 'set_redirect') );

		}

		public function set_sub_pages( AttikaCoreSubPage $sub_page ) {
			$this->sub_pages[$sub_page->get_base()]  = $sub_page;
		}

		function get_sub_pages(){
			return $this->sub_pages;
		}


		function dashboard_add_page() {

			if (attika_core_theme_installed()) {

				$page = add_menu_page(
					esc_html__('Attika Dashboard', 'attika-core'),
					esc_html__('Attika Dashboard', 'attika-core'),
					'administrator',
					'attika_core_dashboard',
					array(&$this, 'attika_core_dashboard_template'),
					ATTIKA_CORE_URL_PATH . '/core-dashboard/assets/img/admin-logo-icon.png',
					3
				);

				add_action( 'load-' . $page, array(&$this, 'load_admin_css') );
			}

			foreach ($this->get_sub_pages() as $sub_page => $sub_page_value) {

				$sub_page_instance = add_submenu_page(
					'attika_core_dashboard',
					$sub_page_value->get_title(), // The value used to populate the browser's title bar when the menu page is active
					$sub_page_value->get_title(),                                                        // The text of the menu in the administrator's sidebar
					'administrator',                                                      // What roles are able to access the menu
					$sub_page,                                            // The ID used to bind submenu items to this menu
					array( $sub_page_value, 'render' )
				);

				add_action( 'load-' . $sub_page_instance, array(&$this, 'load_admin_css') );
			}
		}

		function attika_core_dashboard_template() {

			$params = array();
			$params['system_info'] = AttikaCoreSystemInfoPage::get_instance()->get_system_info();
			$params['info'] = $this->purchased_code_info();
			$params['is_activated'] = !empty($this->get_purchased_code()) ? true : false;


			echo attika_core_get_module_template_part('core-dashboard', 'core-dashboard', '', $params);
		}


		function load_admin_css(){
			add_action( 'admin_enqueue_scripts', array(&$this, 'enqueue_styles') );
			add_action( 'admin_enqueue_scripts', array(&$this, 'enqueue_scripts') );
		}

		function enqueue_styles(){
			wp_enqueue_style( 'attika-core-dashboard-style', plugins_url( ATTIKA_CORE_REL_PATH . '/core-dashboard/assets/css/core-dashboard.min.css' ));
		}

		function enqueue_scripts(){
			wp_enqueue_script( 'select2', MIKADO_FRAMEWORK_ROOT . '/admin/assets/js/select2.min.js', array(), false, true );
			wp_enqueue_script( 'attika-core-dashboard-script', plugins_url( ATTIKA_CORE_REL_PATH . '/core-dashboard/assets/js/modules/core-dashboard.js' ), array(), false, true );
			$global_variables = apply_filters( 'attika_core_dashboard_filter_js_global_variables', array() );

			wp_localize_script( 'attika-core-dashboard-script', 'mkdfCoreDashboardGlobalVars', array(
				'vars' => $global_variables
			) );
		}

		public function register_sub_pages() {

			$sub_pages = apply_filters( 'attika_core_filter_add_sub_page', $icons = array() );

			if ( ! empty( $sub_pages ) ) {
				foreach ( $sub_pages as $sub_page ) {
					$this->set_sub_pages( new $sub_page() );
				}
			}
		}

		function set_redirect() {
			if ( ! is_network_admin() ) {
				set_transient( '_attika_core_welcome_page_redirect', 1, 30 );
			}
		}

		function page_welcome_redirect() {
			$redirect = get_transient( '_attika_core_welcome_page_redirect' );
			delete_transient( '_attika_core_welcome_page_redirect' );
			if ( $redirect ) {
				wp_safe_redirect( add_query_arg( array( 'page' => 'mkdf_fn_themename_theme_dashboard' ), esc_url( admin_url( 'admin.php' ) ) ) );
			}
		}


		function purchase_code_registration(){

			if ( empty( $_POST ) || ! isset( $_POST ) ) {
				return esc_html__( 'All fields are empty', 'attika-core' );
			} else {
				switch ($_POST['options']['action']):
					case 'register':
						$this->register_purchase_code($_POST['options']['post']);
						break;
					case 'deregister':
						$this->deregister_purchase_code();
						break;
				endswitch;
			}

			wp_die();


		}

		function register_purchase_code() {
			$data        = array();
			$data_string = $_POST['options']['post'];
			parse_str( $data_string, $data );

			if ( empty( $data['purchase_code'] ) || empty( $data['email'] ) ) {
				attika_core_ajax_status( 'error', esc_html__( 'Purchase Code and Email are empty', 'attika-core' ), array(
					'purchase_code' => false,
					'email'         => false
				) );
			} elseif ( empty( $data['purchase_code'] ) ) {
				attika_core_ajax_status( 'error', esc_html__( 'Purchase Code is empty', 'attika-core' ), array( 'purchase_code' => false ) );
			} elseif ( empty( $data['email'] ) ) {
				attika_core_ajax_status( 'error', esc_html__( 'Email is empty', 'attika-core' ), array( 'email' => false ) );
			}

			$url = add_query_arg( array(
				'purchase_code' => $data['purchase_code'],
				'email'         => $data['email'],
				'profile'       => MIKADO_PROFILE_SLUG . '-themes',
				'demo_url'      => esc_url( get_site_url() ),
				'action'        => 'register'
			), $this->validation_url );

			$json = $this->api_connection( $url );

			if ( isset( $json['success'] ) && $json['success'] ) {

				update_option( $this->licence_field, $json['data']['validation'] );
				update_option( $this->import_field, $json['data']['import'] );
				attika_core_ajax_status( 'success', $this->response_codes( $json['response_code'] ) );

			} elseif ( isset( $json['message'] ) && ! $json['success'] && ( isset( $json['data']['error'] ) && $json['data']['error'] == 404 ) ) {

				attika_core_ajax_status( 'error', $this->response_codes( $json['response_code'] ), array( 'purchase_code' => false ) );

			} elseif ( isset( $json['message'] ) && ! $json['success'] && ( isset( $json['data']['error'] ) && $json['data']['error'] == 'used' ) ) {

				attika_core_ajax_status( 'error', $this->response_codes( $json['response_code'] ), array( 'already_used' => true ) );

			} elseif ( isset( $json['message'] ) && ! $json['success'] ) {

				attika_core_ajax_status( 'error', $this->response_codes( $json['response_code'] ) );
			}
		}

		function deregister_purchase_code(){

			$code = $this->get_purchased_code();

			$url  = add_query_arg( array(
				'purchase_code' => $code,
				'action'        => 'deregister',
				'profile'       => MIKADO_PROFILE_SLUG . '-themes',
			), $this->validation_url );
			$json = $this->api_connection( $url );

			if ( $json['success'] ) {
				delete_option( $this->licence_field );
				delete_option( $this->import_field );
				attika_core_ajax_status( 'success', $this->response_codes( $json['response_code'] ) );
			} else {
				attika_core_ajax_status( 'error', $this->response_codes( $json['response_code'] ) );
			}


		}

		function check_purchase_code($demo){

			$code = $this->get_purchased_code();

			$url = add_query_arg( array(
				'purchase_code' => $code,
				'action'        => 'check',
				'profile'       => MIKADO_PROFILE_SLUG . '-themes',
				'demo'          => $demo
			), $this->validation_url );

			$json = $this->api_connection($url);

			if($json['success']){
				return true;
			} else {
				return false;
			}
		}

		function get_purchased_code_data() {

			return get_option($this->licence_field);
		}

		function purchased_code_info() {
			$info = $this->get_purchased_code_data();
			if($info && !empty($info)){
				return $info;
			} else {
				return false;
			}
		}

		function get_purchased_code() {
			$info = $this->purchased_code_info();
			if(is_array($info) && isset($info['purchase_code'])){
				return $info['purchase_code'];
			}

			return '';
		}
		function get_import_params() {
			$params = get_option($this->import_field);
			if(is_array($params) && count($params) > 0){
				return $params;
			}
			return false;
		}

		function api_connection($url){

			$response = wp_remote_get(
				$url,
				array(
					'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . esc_url(home_url( '/' )),
					'timeout' => 30
				)
			);

			if ( is_wp_error( $response ) ) {
				return $response;
			}

			if ( '200' != wp_remote_retrieve_response_code( $response ) ) {
				return new WP_Error( 'bad_request', esc_html__('Bad request', 'attika-core' ));
			}

			$json = json_decode( wp_remote_retrieve_body( $response ), true );

			if ( empty( $json ) || ! is_array( $json ) ) {
				return new WP_Error( 'invalid_response',  esc_html__('Invalid Response', 'attika-core' ) );
			}

			return $json;
		}

		function response_codes( $code ) {

			$message = '';

			switch ( $code ):

				case 200:
					$message = esc_html__( 'Failed to validate code due to an error', 'attika-core' );
					break;
				case 400:
					$message = esc_html__( 'Parameter or argument in the request was invalid', 'attika-core' );
					break;
				case 401:
					$message = esc_html__( 'The authorization header is missing. Verify that your code is correct.', 'attika-core' );
					break;
				case 403:
					$message = esc_html__( 'Personal token is incorrect or does not have the required permission(s)', 'attika-core' );
					break;
				case 404:
					$message = esc_html__( 'The purchase code is invalid', 'attika-core' );
					break;
				case 601:
					$message = esc_html__( 'You successfully activated theme', 'attika-core' );
					break;
				case 602:
					$message = esc_html__( 'Code is valid', 'attika-core' );
					break;
				case 603:
					$message = esc_html__( 'You successfully added demo', 'attika-core' );
					break;
				case 604:
					$message = esc_html__( 'You successfully deregister theme', 'attika-core' );
					break;
				case 650:
					$message = esc_html__( 'Code is already registered for other domain', 'attika-core' );
					break;
				case 651:
					$message = esc_html__( 'Error occurred during activation', 'attika-core' );
					break;
				case 652:
					$message = esc_html__( 'Code is invalid', 'attika-core' );
					break;
				case 653:
					$message = esc_html__( 'Error occurred during adding', 'attika-core' );
					break;
				case 654:
					$message = esc_html__( 'Error occurred during deactivation', 'attika-core' );
					break;
			endswitch;


			return $message;
		}
		
		function theme_validation() {
			$is_theme_active = attika_core_theme_installed();
			attika_core_ajax_status( 'success', '', array( 'is_theme_active' => $is_theme_active ) );
		}
		
		function get_code() {
			$code = $this->get_purchased_code();
			if ( empty( $code ) && ( in_array( getenv( 'REMOTE_ADDR' ), array( '127.0.0.1', '::1' ), true ) || strpos( getenv( 'HTTP_HOST' ), 'qodeinteractive' ) !== false ) ) {
				$code = true;
			}
			return $code;
		}
		
		public function is_theme_registered() {
			$code = $this->get_code();
			return attika_core_theme_installed() && $code;
		}
	}

	AttikaCoreDashboard::get_instance();
}