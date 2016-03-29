<?php
namespace SmartLab\FaqTool\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for cms block search results.
 * @api
 */
interface CmsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get blocks list.
     *
     * @return \Magento\Cms\Api\Data\BlockInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param \Magento\Cms\Api\Data\BlockInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
