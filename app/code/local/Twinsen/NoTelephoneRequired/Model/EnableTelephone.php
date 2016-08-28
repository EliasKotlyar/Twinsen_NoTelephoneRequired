<?php
class Twinsen_NoTelephoneRequired_Model_EnableTelephone extends Mage_Core_Model_Config_Data{
    public function save()
    {
        $enabled = $this->getValue(); //get the value from our config
        $resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $writeConnection = $resource->getConnection('core_write');

        //die($enabled);


        $query = 'SELECT attribute_id FROM eav_attribute WHERE `attribute_code` = \'telephone\'';
        $attribute_id = $readConnection->fetchOne($query);


        $query = 'UPDATE eav_attribute SET `is_required` = \''.$enabled.'\' WHERE `attribute_code` = \'telephone\'';
        $writeConnection->query($query);






        if($enabled == 1){
            $validationRules = 'a:2:{s:15:"max_text_length";i:255;s:15:"min_text_length";i:1;}';
            $query = 'UPDATE customer_eav_attribute SET `validate_rules` = \''.$validationRules.'\' WHERE `attribute_id` = \''.$attribute_id.'\'';
            $writeConnection->query($query);
        }else{
            $query = 'UPDATE customer_eav_attribute SET `validate_rules` = NULL WHERE `attribute_id` = \''.$attribute_id.'\'';
            $writeConnection->query($query);
        }
        //die($attribute_id);










        return parent::save();  //call original save method so whatever happened
        //before still happens (the value saves)
    }
}
?>