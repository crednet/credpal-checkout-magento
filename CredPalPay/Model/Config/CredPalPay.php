<?php

namespace CredPal\CredPalPay\Model\Config;

use CredPal\CredPalPay\Model\PaymentMethod;
use Magento\Payment\Helper\Data as Helper;
use Magento\Store\Model\Store;

class CredPalPay implements \Magento\Checkout\Model\ConfigProviderInterface
{
    protected $helper;
    protected $store;

    public function __construct(
        Helper $helper,
        Store $store
    ) {
        $this->helper = $helper->getMethodInstance(PaymentMethod::CODE);
        $this->store = $store;
    }

    public function getConfig()
    {
        return [
            PaymentMethod::CODE => [
                'merchant_id' => $this->helper->getConfigData('merchant_id'),
                'restore_cart_url' => $this->store->getBaseUrl() . 'credpalpay/cart/restore'
            ]
        ];
    }
}
