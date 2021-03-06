<?php
namespace AttikaRestaurant\Lib;

/**
 * interface PostTypeInterface
 * @package AttikaRestaurant\Lib;
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