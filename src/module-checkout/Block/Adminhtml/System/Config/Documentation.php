<?php
/**
* 
* Checkout para Magento 2
* 
* @category     elOOm
* @package      Modulo Checkout
* @copyright    Copyright (c) 2025 elOOm (https://eloom.com.br)
* @version      1.0.0
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Checkout\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Documentation extends Field {
	
	protected function _getElementHtml(AbstractElement $element) {
		return '<a href="https://docs.eloom.tech/checkout/" target="_blank">' . __('Documentation') . '</a>';
	}
}
