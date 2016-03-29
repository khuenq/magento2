<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace SmartLab\FaqTool\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'cms_block'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('faqtool_faq')
        )->addColumn(
            'faq_id',
            Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'FAQ ID'
        )->addColumn(
            'question',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Question'
        )->addColumn(
            'answer',
            Table::TYPE_TEXT,
            '2M',
            [],
            'Answer'
        )->addColumn(
            'creation_time',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Block Creation Time'
        )->addColumn(
            'update_time',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Block Modification Time'
        )->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1'],
            'Is FAQ Active'
        )->addIndex(
            $setup->getIdxName(
                $installer->getTable('cms_block'),
                ['title', 'identifier', 'content'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            ['title', 'identifier', 'content'],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        )->setComment(
            'FAQ Table'
        );
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'cms_block_store'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('faqtool_faq_store')
        )->addColumn(
            'faq_id',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'primary' => true],
            'FAQ ID'
        )->addColumn(
            'store_id',
            Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false, 'primary' => true],
            'Store ID'
        )->addIndex(
            $installer->getIdxName('faqtool_faq_store', ['store_id']),
            ['store_id']
        )->addForeignKey(
            $installer->getFkName('faqtool_faq_store', 'faq_id', 'faqtool_faq', 'faq_id'),
            'faq_id',
            $installer->getTable('faqtool_faq'),
            'faq_id',
            Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName('faqtool_faq_store', 'store_id', 'store', 'store_id'),
            'store_id',
            $installer->getTable('store'),
            'store_id',
            Table::ACTION_CASCADE
        )->setComment(
            'FAQ To Store Linkage Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
