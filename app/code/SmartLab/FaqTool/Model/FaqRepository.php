<?php

namespace SmartLab\FaqTool\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use SmartLab\FaqTool\Api\FaqRepositoryInterface;
use SmartLab\FaqTool\Model\ResourceModel\Faq as ResourceFaq;
use SmartLab\FaqTool\Model\ResourceModel\Faq\CollectionFactory as FaqCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class FaqRepository implements FaqRepositoryInterface
{

}