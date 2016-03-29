<?php

namespace SmartLab\FaqTool\Model\ResourceModel\Faq;

use SmartLab\FaqTool\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'faqtool_faq';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('SmartLab\FaqTool\Model\Faq', 'SmartLab\FaqTool\Model\ResourceModel\Faq');
        $this->_map['fields']['store'] = 'store_table.store_id';
    }


    /**
     * Add filter by store
     *
     * @param int|array|\Magento\Store\Model\Store $store
     * @param bool $withAdmin
     * @return $this
     */
    public function addStoreFilter($store, $withAdmin = true)
    {
        $this->performAddStoreFilter($store, $withAdmin);

        return $this;
    }
}