<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace SmartLab\FaqTool\Block\Adminhtml\Faq;
use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;

/**
 * CMS block edit form container
 */
class Edit extends Container
{
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'faq_id';
        $this->_blockGroup = 'SmartLab_FaqTool';
        $this->_controller = 'adminhtml_faq';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save FAQ'));
        $this->buttonList->update('delete', 'label', __('Delete FAQ'));

        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form']],
                ]
            ],
            -100
        );
    }

    /**
     * Get edit form container header text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('cms_block')->getId()) {
            return __("Edit FAQ '%1'", $this->escapeHtml($this->_coreRegistry->registry('faqtool_faq')->getTitle()));
        } else {
            return __('New FAQ');
        }
    }
}
