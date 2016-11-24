<?php


class Zend_View_Helper_ClassActive extends Zend_View_Helper_Abstract
{
    public function classActive($params) {
        $currentUrl = $this->view->url();
        $destUrl = $this->view->url($params, false, true);
        return ($currentUrl === $destUrl) ? ' class="active"': '';
    }
}
