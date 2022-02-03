<?php
namespace AttikaRestaurant\CPT\RestaurantMenu;

use AttikaRestaurant\Lib;

/**
 * Class RestaurantMenuRegister
 * @package AttikaRestaurant\CPT\RestaurantMenu
 */

class RestaurantMenuRegister implements Lib\PostTypeInterface {
	/**
	 * @var string
	 */
	private $base;
	/**
	 * @var string
	 */
	private $taxBase;

	public function __construct() {
		$this->base    = 'restaurant-menu';
		$this->taxBase = 'restaurant-menu-category';
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}

	/**
	 * Regsiters custom post type with WordPress
	 */
	private function registerPostType() {

		$menuPosition = 5;
		$menuIcon     = 'dashicons-list-view';

		register_post_type($this->base,
			array(
				'labels'        => array(
					'name'          => __('Restaurant Menu', 'attika-restaurant'),
					'menu_name'     => __('Restaurant Menu', 'attika-restaurant'),
					'all_items'     => __('Restaurant Menu Items', 'attika-restaurant'),
					'add_new'       => __('Add New Restaurant Menu Item', 'attika-restaurant'),
					'singular_name' => __('Restaurant Menu Item', 'attika-restaurant'),
					'add_item'      => __('New Restaurant Menu Item', 'attika-restaurant'),
					'add_new_item'  => __('Add New Restaurant Menu Item', 'attika-restaurant'),
					'edit_item'     => __('Edit Restaurant Menu Item', 'attika-restaurant')
				),
				'public'        => false,
				'show_in_menu'  => true,
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array('title', 'thumbnail'),
				'menu_icon'     => $menuIcon
			)
		);
	}

	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => __('Restaurant Menu Category', 'attika-restaurant'),
			'singular_name'     => __('Restaurant Menu Category', 'attika-restaurant'),
			'search_items'      => __('Search Restaurant Menu Categories', 'attika-restaurant'),
			'all_items'         => __('All Restaurant Menu Categories', 'attika-restaurant'),
			'parent_item'       => __('Parent Restaurant Menu Category', 'attika-restaurant'),
			'parent_item_colon' => __('Parent Restaurant Menu Category:', 'attika-restaurant'),
			'edit_item'         => __('Edit Restaurant Menu Category', 'attika-restaurant'),
			'update_item'       => __('Update Restaurant Menu Category', 'attika-restaurant'),
			'add_new_item'      => __('Add New Restaurant Menu Category', 'attika-restaurant'),
			'new_item_name'     => __('New Restaurant Menu Category Name', 'attika-restaurant'),
			'menu_name'         => __('Restaurant Menu Categories', 'attika-restaurant'),
		);

		register_taxonomy($this->taxBase, array($this->base), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
		));
	}

}