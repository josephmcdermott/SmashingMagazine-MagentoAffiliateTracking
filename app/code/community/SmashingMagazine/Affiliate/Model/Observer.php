<?php
class SmashingMagazine_Affiliate_Model_Observer
{
    const COOKIE_KEY_SOURCE = 'smashingmagazine_affiliate_source';

    public function captureReferral(Varien_Event_Observer $observer)
    {
        $frontController = $observer->getEvent()->getFront();

        $utmSource = $frontController->getRequest()
            ->getParam('utm_source', false);

        if ($utmSource) {
            Mage::getModel('core/cookie')->set(
                self::COOKIE_KEY_SOURCE, 
                $utmSource, 
                $this->_getCookieLifetime()
            );
        }
    }

    protected function _getCookieLifetime()
    {
        $days = Mage::getStoreConfig(
            'smashingmagazine_affiliate/cookie/timeout'
        );

        // convert to seconds
        return (int)86400 * $days;
    }
}