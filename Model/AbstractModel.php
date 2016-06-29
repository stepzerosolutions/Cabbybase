<?php
/**
 * Copyright © 2016 Stepzerosolutions. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Stepzerosolutions\Base\Model;

use Magento\Framework\Api\AttributeValueFactory;
/**
 * Abstract model for Base Class
 *
 * @author      Don Nuwinda <nuwinda@stepzerosolutions.co.nz>
 */
abstract class AbstractModel extends \Magento\Framework\Model\AbstractExtensibleModel
{
    /**
     * Store Manager
     *
     * @var StoreManagerInterface $storeManager
     */
    protected $_storeManager;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory
     * @param AttributeValueFactory $customAttributeFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        AttributeValueFactory $customAttributeFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        parent::__construct(
            $context,
            $registry,
            $extensionFactory,
            $customAttributeFactory,
            $resource,
            $resourceCollection,
            $data
        );
		$this->setIncludePath();
    }

	
    /**
     * Set Google API Path
     *
     * @return array
     */	
	public function setIncludePath(){
		set_include_path(  get_include_path() . PATH_SEPARATOR . dirname( __FILE__ ) . '/../vendor/google/apiclient/src');
	}
	
    /**
     * Retrieve config
     *
     * @return string
     */
    public function getConfigData($config)
    {
		$store = $this->_storeManager->getStore()->getId(); 
		return $this->_scopeConfig->getValue(
				$config, 
				\Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store 
			) ;
    }
}