<?php
/*
Plugin Name: Yandex.Disk API Provider
Plugin URI: https://github.com/aslanbaryshnikov/yd-api-provider
Description: The plugin provides access to the Yandex.Disk REST API in your code. You can use it to develop your own plugins that will use Yandex.Disk.
Version: 1.0.0
Author: Aslan Baryshnikov
Author URI: mailto:aslanbaryshnikov@gmail.com
*/

/*  Copyright 2021  Aslan Baryshnikov  (email: aslanbaryshnikov@gmail.com)

		This program is free software; you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation; either version 2 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program; if not, write to the Free Software
		Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once __DIR__.'/vendor/autoload.php';

class YD_API_Provider {
	private static $inited = false;

	public static function get_instance() {
		$token = get_option('ydapip_token');
		return new Arhitector\Yandex\Disk($token);
	}

	public static function init() {
		if (self::$inited) return;

		self::$inited = true;

		load_plugin_textdomain('ydapip');

		add_action('admin_menu', array(__CLASS__, 'admin_page'));
	}

	public static function admin_page() {
		add_options_page(
			__('Yandex.Disk API Provider Settings', 'ydapip'),
			__('Yandex.Disk', 'ydapip'),
			'administrator',
			'yd-api-provider/settings.php'
		);
	}
}

YD_API_Provider::init();
