<?php

if (! defined('ABSPATH')) {
	exit;
}

class Anker_Connect_Elementor_Wls_PlanbarLogin_Widget extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'wls-planbar-login';
	}

	public function get_title()
	{
		return __('Planbar login', '5-anker-connect');
	}

	public function get_categories()
	{
		return [ 'connect-wls' ];
	}

	public function get_icon()
	{
		return 'fa fa-sign-in';
	}

	protected function _register_controls()
	{
	}

	protected function render($instance = [])
	{
		echo '<wls-planbar-login></wls-planbar-login>';
	}
}
