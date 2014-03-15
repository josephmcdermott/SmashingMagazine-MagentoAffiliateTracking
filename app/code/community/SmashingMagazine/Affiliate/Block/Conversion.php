<?php
class SmashingMagazine_Affiliate_Block_Conversion extends Mage_Core_Block_Template
{
    public function getIsActive()
    {
        return Mage::getStoreConfig('smashingmagazine_affiliate/general/status') ? true : false;
    }

    public function getMerchantId()
    {
        return Mage::getStoreConfig('smashingmagazine_affiliate/general/merchant_id');
    }

    public function getAffiliateId()
    {
        return Mage::getModel('core/cookie')->get(
            SmashingMagazine_Affiliate_Model_Observer::COOKIE_KEY_SOURCE
        );
    }
}