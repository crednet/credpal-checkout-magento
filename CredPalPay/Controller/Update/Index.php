<?php

namespace CredPal\CredPalPay\Controller\Update;

use Magento\Checkout\Model\Cart;
use Magento\Checkout\Model\Session;
use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use Magento\Framework\ObjectManager\ObjectManager;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order;

class Index extends Action
{
    protected $_orderRepository;
    protected $checkoutSession;

    public function __construct(
        Context $context,
        OrderRepositoryInterface $orderRepository,
        Session $checkoutSession,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_orderRepository = $orderRepository;
        $this->checkoutSession = $checkoutSession;
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        if ($this->getRequest()->isAjax()) {
            $order = $this->checkoutSession->getLastRealOrder();
            $order->setState(Order::STATE_PROCESSING, true);
            $order->setStatus(Order::STATE_PROCESSING, true);
            $order->addStatusToHistory($order->getStatus(), 'Order Process successfully with CredPal Pay');
            $this->_orderRepository->save($order);

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $cartObject = $objectManager->create(Cart::class);
            $cartObject->truncate()->saveQuote();

            return $result->setData("order status updated");
        }
    }
}
