<?php

class Twinsen_NoTelephoneRequired_Model_Sales_Order_Address
    extends Mage_Sales_Model_Order_Address
{
    protected function _basicCheck()
    {
        parent::_basicCheck();
        $this->_errors = Mage::helper('Twinsen_NoTelephoneRequired')->processErrors($this->_errors);
    }
}