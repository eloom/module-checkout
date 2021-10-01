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

namespace Eloom\Checkout\Model;

use Eloom\Checkout\Api\CheckoutInterface;
use Eloom\Checkout\Helper\Data;
use GuzzleHttp\Client;
use Magento\Customer\Model\CustomerFactory;
use Magento\Directory\Model\RegionFactory;
use Magento\Store\Model\StoreManagerInterface;

class Checkout implements CheckoutInterface {
	
	private $customerFactory;
	
	private $regionFactory;
	
	private $storeManager;
	
	private $helper;
	
	public function __construct(CustomerFactory $customerFactory,
	                            RegionFactory $regionFactory,
	                            StoreManagerInterface $storeManager,
	                            Data $helper) {
		$this->customerFactory = $customerFactory;
		$this->regionFactory = $regionFactory;
		$this->storeManager = $storeManager;
		$this->helper = $helper;
	}
	
	/**
	 * @inheritDoc
	 */
	public function isTaxvatAvailable($taxvat, $websiteId = null) {
		if ($websiteId === null) {
			$websiteId = $this->storeManager->getStore()->getWebsiteId();
		}
		if (!$this->helper->validateUniqueTaxvat($this->storeManager->getStore()->getId())) {
			return true;
		}
		$customer = $this->customerFactory->create()->getCollection()
			->addAttributeToSelect("taxvat")
			->addFieldToFilter("website_id", ["eq" => $websiteId])
			->addFieldToFilter("taxvat", [
				["eq" => $taxvat],
				["eq" => preg_replace('/\D/', '', $taxvat)]
			])
			->load();
		
		return (count($customer) == 0);
	}
}