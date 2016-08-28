<?php

class Twinsen_NoTelephoneRequired_Model_Customer_Address
    extends Mage_Customer_Model_Address
    // extends Mage_Customer_Model_Address_Abstract
{


    protected function _basicCheck()
    {
        parent::_basicCheck();
        $this->_errors = Mage::helper('Twinsen_NoTelephoneRequired')->processErrors($this->_errors);
    }
}