<?php
/**
 * Class IndexController
 */
class IndexController extends Zend_Controller_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {
        return $this->redirect('/user');
    }
}
