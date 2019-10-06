<?php
/**
 * @category  HS
 *
 * @copyright Copyright (c) 2015 Hungersoft (http://www.hungersoft.com)
 * @license   http://www.hungersoft.com/license.txt Hungersoft General License
 */

namespace HS\Honeypot\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

/**
 * Class AdditionalEmail.
 */
class CustomForms extends AbstractFieldArray
{
    /**
     * {@inheritdoc}
     */
    protected function _prepareToRender()
    {
        $this->addColumn('selector', ['label' => __('Selector'), 'class' => 'required-entry']);
        $this->addColumn('action', ['label' => __('Form Action'), 'class' => 'required-entry']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Form');
    }
}
