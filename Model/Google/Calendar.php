<?php
/**
 * Copyright © 2015 Stepzero.solutions adventure theme. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Stepzerosolutions\Base\Model\Google;

use Magento\Store\Model\StoreManagerInterface;
/**
 * ForgeOnline Configuration Module
 *
 */
class Calendar extends \Stepzerosolutions\Base\Model\AbstractModel
{
    /**
     * Config
     *
     * @var  \Magento\Framework\App\Config\ScopeConfigInterface
     */
	protected $_scopeConfig;
	
    /**
     * Store Manager
     *
     * @var StoreManagerInterface $storeManager
     */
    protected $_storeManager;


	public function __construct(
		StoreManagerInterface $storeManager,
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
	)
	{
		$this->_scopeConfig = $scopeConfig;
		$this->_storeManager = $storeManager;
		$this->setLibPath();
	}

	public function setLibPath(){
		$this->setIncludePath();
	}
	
	public function setCalandarConnection(){
		$apikey = $this->getConfigData( \Stepzerosolutions\Base\Model\Common::CONFIG_GOOGLE_CALENDERAPI );
		$client = new \Google_Client();
		
	}
	
	
}
