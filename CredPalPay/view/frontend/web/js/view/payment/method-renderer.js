define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'credpalpay',
                component: 'CredPal_CredPalPay/js/view/payment/method-renderer/credpalpay'
            }
        );
        return Component.extend({});
    }
);
