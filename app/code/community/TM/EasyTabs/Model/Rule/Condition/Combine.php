<?php

class TM_EasyTabs_Model_Rule_Condition_Combine
    extends Mage_CatalogRule_Model_Rule_Condition_Combine

{
    public function __construct()
    {
        parent::__construct();
        $this->setType('easytabs/rule_condition_combine');
    }

    public function getNewChildSelectOptions()
    {
        $conditions = parent::getNewChildSelectOptions();
        if (isset($conditions[1]['value'])
            && $conditions[1]['value'] == 'catalogrule/rule_condition_combine'
        ) {
            $conditions[1]['value'] = $this->getType();
        }

        $customerConditions = array(
            array(
                'label' => Mage::helper('customer')->__('Customers'),
                'value' => array(
                    array(
                        'label' => Mage::helper('customer')->__('Customer Groups'),
                        'value' => 'easytabs/rule_condition_customer|customer_group'
                    )
                )
            )
        );

        // very bold assumption that $conditions[2] is product attributes
        if (isset($conditions[2]) && !$this->getRule()->getProductTab()) {
            unset($conditions[2]);
        }
        array_splice($conditions, 2, 0, $customerConditions);

        return $conditions;
    }

}
