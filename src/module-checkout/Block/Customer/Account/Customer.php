<?php
/**
* 
* Checkout para Magento 2
* 
* @category     Ã©lOOm
* @package      Modulo Checkout
* @copyright    Copyright (c) 2021 Ã©lOOm (https://eloom.tech)
* @version      1.0.0
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Checkout\Block\Customer\Account;

use Magento\Framework\Json\EncoderInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Customer extends Template {
	
	protected $jsonEncoder = null;
	
	public function __construct(Context $context,
	                            EncoderInterface $jsonEncoder,
	                            array $data = []) {
		$this->jsonEncoder = $jsonEncoder;
		parent::__construct($context, $data);
	}
	
	/**
	 * Composes configuration for js
	 *
	 * @return string
	 */
	public function getJsonConfig() {
		return $this->jsonEncoder->encode([
			'messages' => [
				'taxvat' => __('Taxvat already registered')
			]
		]);
	}
}