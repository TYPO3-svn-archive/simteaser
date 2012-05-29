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
class Tx_Simteaser_Domain_Model_Widget extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * items
	 *
	 * @var array
	 */
	protected $items;

	/**
	 * width
	 *
	 * @var string
	 */
	protected $width;

	/**
	 * height
	 *
	 * @var string
	 */
	protected $height;

	/**
	 * Returns the items
	 *
	 * @return array $items
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * Sets the items
	 *
	 * @param string $items
	 * @return void
	 */
	public function setItems($items) {
		$this->items = $items;
	}

	/**
	 * Returns the width
	 *
	 * @return string $width
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Sets the width
	 *
	 * @param string $width
	 * @return void
	 */
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * Returns the height
	 *
	 * @return string $height
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Sets the height
	 *
	 * @param string $height
	 * @return void
	 */
	public function setHeight($height) {
		$this->height = $height;
	}

	/**
	* Create the data structure from flex form.
	*
	* This method might rather belong to a domain model. It is here because
	* the flexform data is not initialized in the domain model.
	*
	* @param array Flexform configuration
	* @return array	image, text, link
	*/
	function initFromFlexform($flexFormConfig) {
			// widget configuration
		$widgetConfig = $flexFormConfig['widget'];
		$this->setWidth($widgetConfig['width']);
		$this->setHeight($widgetConfig['height']);

			// item configuration
		$itemConfig = $flexFormConfig['item'];
		$images = t3lib_div::trimExplode(',', $itemConfig['images']);
		$texts = t3lib_div::trimExplode(chr(10), $itemConfig['texts']);
		$links = t3lib_div::trimExplode(chr(10), $itemConfig['links']);
		if(strpos($widgetConfig['width'],'%') !== false) {
			$itemWidth .= round(100/count($images),2) . '%';
		} else {
			$itemWidth = intval($widgetConfig['width']/count($images)) . 'px';
		};
		if($images) {
			foreach($images as $key => $value) {
				$text = isset($texts[$key]) ? $texts[$key] : '';
				$link = isset($links[$key]) ? $links[$key] : '';
				$item = t3lib_div::makeInstance('Tx_Simteaser_Domain_Model_Item');
				$item->setImage($images[$key]);
				$item->setText($text);
				$item->setLink($link);
				$item->setWidth($itemWidth);
				$this->items[] = $item;
			};
		};
	}

}
?>