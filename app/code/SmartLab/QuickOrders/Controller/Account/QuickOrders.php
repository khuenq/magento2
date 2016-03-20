<?php
namespace SmartLab\QuickOrders\Controller\Account;

// Import front action class
use Magento\Framework\App\Action\Action as FrontAction;
// Import page factory and action context
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class QuickOrders extends FrontAction
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $pageObject = $this->pageFactory->create();
        return $pageObject;
    }
}