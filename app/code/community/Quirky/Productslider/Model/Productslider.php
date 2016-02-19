<!-- app/code/community/Quirky/Productslider/Model/Productslider.php -->
<?php
class Quirky_Productslider_Model_Productslider extends Mage_Core_Model_Abstract {
    public function getRecentProducts() {
        $products = Mage::getModel("catalog/product")
            ->getCollection()
            ->addAttributeToSelect('*')
            ->setOrder('entity_id', 'DESC')
            ->setPageSize(5);
        return $products;
    }
}
