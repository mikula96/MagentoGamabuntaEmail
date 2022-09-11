<?php

namespace Gamabunta\Email\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const EMAIL_SECTION = 'email/';
    const GENERAL_GROUP = self::EMAIL_SECTION.'general/';

    /**
     * Fetch value for specific configuration field from system.xml file
     *
     * @param $path - field inside email/general group from system.xml
     * @param $storeId - id for which configuration value should be fetched
     * @return mixed
     */
    public function getEmailGeneralConfig($path, $storeId = null){
        return $this->scopeConfig->getValue(self::GENERAL_GROUP.$path, ScopeInterface::SCOPE_STORE, $storeId);
    }
}