<?php
namespace SmartLab\QuickOrders\Controller\QuickOrders;
// Import front action class
use Magento\Framework\App\Action\Action as FrontAction;
// Import page factory and action context
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\App\Action\Context;
class GetProductInfo extends FrontAction
{

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    public function __construct(
        Context $context,
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        // Get product id from request
        $sku = $this->getRequest()->getParam('sku');
        $qty = $this->getRequest()->getParam('qty');

        if ($sku) {
            try {
                /** @var \Magento\Catalog\Model\Product $product */
                $product = $this->productRepository->get($sku);
                echo json_encode(array(
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'price' => $product->getFinalPrice($qty)
                ));
                die;
            } catch (\Exception $e) {
                echo json_encode(array());
                die;
            }
        }

        echo json_encode(array());
        die;
    }   
}