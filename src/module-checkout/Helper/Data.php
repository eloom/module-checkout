<?php
/**
* 
* Checkout para Magento 2
* 
* @category     elOOm
* @package      Modulo Checkout
* @copyright    Copyright (c) 2021 Ã©lOOm (https://eloom.tech)
* @version      1.0.0
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Checkout\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

	const XML_PATH_UNIQUE_TAXVAT = 'eloom_checkout/general/unique_taxvat';
	
	protected $scopeConfig;

	public function __construct(Context $context, ScopeConfigInterface $scopeConfig) {
		$this->scopeConfig = $scopeConfig;
		parent::__construct($context);
	}

	public function validateUniqueTaxvat($storeId = null) {
		return (boolean) $this->scopeConfig->getValue(self::XML_PATH_UNIQUE_TAXVAT, ScopeInterface::SCOPE_STORE, $storeId);
	}
}