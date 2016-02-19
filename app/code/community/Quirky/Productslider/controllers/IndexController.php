<?php
class Quirky_Productslider_IndexController extends Mage_Core_Controller_Front_Action
{
    protected function _initAction() {
        $this->loadLayout();
        return $this;
    }

    public function indexAction() {
        $this->_initAction();
        $this->renderLayout();
    }
}
