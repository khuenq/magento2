<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace SmartLab\FaqTool\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Adminhtml cms blocks content block
 */
class Faq extends Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'SmartLab_Faq';
        $this->_controller = 'adminhtml_faq';
        $this->_headerText = __('FAQs');
        $this->_addButtonLabel = __('Add New FAQ');
        parent::_construct();
    }
}
