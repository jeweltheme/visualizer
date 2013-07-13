<?php

// +----------------------------------------------------------------------+
// | Copyright 2013  Madpixels  (email : visualizer@madpixels.net)        |
// +----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License, version 2, as  |
// | published by the Free Software Foundation.                           |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to the Free Software          |
// | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston,               |
// | MA 02110-1301 USA                                                    |
// +----------------------------------------------------------------------+
// | Author: Eugene Manuilov <eugene@manuilov.org>                        |
// +----------------------------------------------------------------------+

/**
 * Renders chart settings page.
 *
 * @category Visualizer
 * @package Render
 *
 * @since 1.0.0
 */
class Visualizer_Render_Page_Settings extends Visualizer_Render_Page {

	/**
	 * Enqueues scripts and styles what will be used in a page.
	 *
	 * @since 1.0.0
	 * @uses wp_enqueue_script() To enqueue chart rendering JS files.
	 *
	 * @access protected
	 */
	protected function _enqueueScripts() {
		parent::_enqueueScripts();
		wp_enqueue_script( 'visualizer-preview' );
	}

	/**
	 * Renders page head.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderHead() {
		parent::_renderHead();
		echo '<script type="text/javascript">';
			echo 'window.visualizer = {charts: {canvas: {';
				echo "type: '", $this->type, "', ";
				echo 'series: ', $this->series, ', ';
				echo 'data: ', $this->chart->post_content;
			echo '}}};';
		echo '</script>';
	}

	/**
	 * Renders page content.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderContent() {
		echo '<div id="canvas"></div>';
	}

	/**
	 * Renders toolbar content.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderToolbar() {
		echo '<a class="button button-large" href="', add_query_arg( 'tab', 'data' ), '">';
			esc_html_e( 'Back', Visualizer_Plugin::NAME );
		echo '</a>';
		echo '<input type="submit" class="button button-primary button-large push-right" value="', esc_attr__( 'Save Chart And Insert', Visualizer_Plugin::NAME ), '">';
	}

}