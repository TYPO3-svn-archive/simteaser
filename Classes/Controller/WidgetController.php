<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Roman Buechler <rb@synac.com>, Synac Technology, S.L.
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package simteaser
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Simteaser_Controller_WidgetController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * action init
	 *
	 * @return void
	 */
	public function initAction() {
		$widget = t3lib_div::makeInstance('Tx_Simteaser_Domain_Model_Widget');
		$widget->initFromFlexform($this->settings['flexform']);
		$this->view->assign('widget', $widget);
		$this->view->assign('items', $widget->getItems());
	}

}
?>