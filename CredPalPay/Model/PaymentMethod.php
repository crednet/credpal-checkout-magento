<?php

namespace CredPal\CredPalPay\Model;

/**
 * CredPal Custom Payment Method Model
 */
class PaymentMethod extends \Magento\Payment\Model\Method\AbstractMethod
{

    /**
     * Payment Method code
     *
     * @var string
     */
    protected $_code = 'credpalpay';

    const CODE = 'credpalpay';
}
