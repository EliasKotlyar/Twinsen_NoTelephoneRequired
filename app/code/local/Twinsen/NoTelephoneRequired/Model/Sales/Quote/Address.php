<?php

class Twinsen_NoTelephoneRequired_Model_Sales_Quote_Address
    extends Mage_Sales_Model_Quote_Address
    // extends Mage_Customer_Model_Address_Abstract
{


    protected function _basicCheck()
    {
        parent::_basicCheck();
        $this->_errors = Mage::helper('Twinsen_NoTelephoneRequired')->processErrors($this->_errors);
    }
}