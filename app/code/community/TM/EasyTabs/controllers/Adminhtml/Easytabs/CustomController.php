<?php

class TM_EasyTabs_Adminhtml_Easytabs_CustomController
    extends TM_EasyTabs_Controller_Adminhtml_Abstract
{

    public function indexAction()
    {
        $this->_title($this->__('TM'))
            ->_title($this->__('EasyTabs'))
            ->_title($this->__('Custom Tabs'));
        parent::indexAction();
    }

}
