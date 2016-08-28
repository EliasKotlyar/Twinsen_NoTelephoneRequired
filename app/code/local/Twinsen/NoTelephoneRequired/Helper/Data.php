<?php

class Twinsen_NoTelephoneRequired_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function processErrors($errors)
    {
        $errorString = Mage::helper('customer')->__('Please enter the telephone number.');
        if (($key = array_search($errorString, $errors)) !== false) {
            unset($errors[$key]);
        }
        return $errors;
    }
}
