<!-- app/code/community/Quirky/Productslider/Block/Productslider.php -->
<?php
class Quirky_Productslider_Block_Productslider
    extends Mage_Core_Block_Template {

    public function getRecentProducts() {
        // call model to fetch data
        $arr_products = array();
        $products = Mage::getModel("productslider/productslider")->getRecentProducts();

        foreach ($products as $product) {
            $arr_products[] = array(
                'id' => $product->getId(),
                'name' => $product->getName(),
                'url' => $product->getProductUrl(),
            );
        }

        return $arr_products;
    }

}
