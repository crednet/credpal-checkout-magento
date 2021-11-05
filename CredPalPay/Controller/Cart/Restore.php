<?php

namespace CredPal\CredPalPay\Controller\Cart;

use Magento\Checkout\Model\Session;
use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use Magento\Sales\Model\Order;

class Restore extends Action
{
    protected $checkoutSession;

    public function __construct(Context $context, Session $checkoutSession)
    {
        parent::__construct($context);
        $this->checkoutSession = $checkoutSession;
    }

    public function execute()
    {

        $lastRealOrder = $this->checkoutSession->getLastRealOrder();
//        if ($lastRealOrder->getData('state') === 'new' && $lastRealOrder->getData('status') === 'pending') {

        $this->checkoutSession->restoreQuote();

        $this->_redirect('checkout', ['_fragment' => 'payment']);
    }
}
