<?php


class Zend_View_Helper_RUrl extends Zend_View_Helper_Abstract
{
    public function rUrl($params) {
        return $this->view->url($params, false, true);
    }
}
