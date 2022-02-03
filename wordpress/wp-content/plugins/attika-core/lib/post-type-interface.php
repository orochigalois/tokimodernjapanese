<?php

namespace AttikaCore\Lib;

/**
 * interface PostTypeInterface
 * @package AttikaCore\Lib;
 */
interface PostTypeInterface {
	/**
	 * @return string
	 */
	public function getBase();
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register();
}