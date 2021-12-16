define(
    [
        "jquery",
        'mage/url',
        "Magento_Checkout/js/view/payment/default",
        "Magento_Checkout/js/action/place-order",
        "Magento_Checkout/js/model/payment/additional-validators",
        "Magento_Checkout/js/model/quote",
        "Magento_Checkout/js/model/full-screen-loader",
        "Magento_Checkout/js/action/redirect-on-success",
        "https://corporate-loans.s3.amazonaws.com/minifiedJS/index.js"
    ],
    function (
        $,
        mageUrl,
        Component,
        placeOrderAction,
        additionalValidators,
        quote,
        fullScreenLoader,
        redirectOnSuccessAction,
        Checkout
    ) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'CredPal_CredPalPay/payment/credpalpay'
            },
            redirectAfterPlaceOrder: false,
            // placeOrder: function () {
            //
            //     // return;
            // },
            afterPlaceOrder: function () {
                const merchantId = window.checkoutConfig.credpalpay.merchant_id;
                let redirectToSuccess = false;

                const checkout = new Checkout({
                    key: merchantId,
                    product: 'iphone 13',
                    amount: quote.totals().grand_total,
                    onClose: () => {
                        console.log("Widget closed");
                        console.log(redirectToSuccess);
                        if (!redirectToSuccess) {
                            console.log("Enter restore cart function")
                            window.location.replace(mageUrl.build('credpalpay/cart/restore'));
                        }
                    },
                    onLoad: () => console.log("Widget loaded successfully"),
                    onSuccess: (data) => {
                        redirectToSuccess = true;
                        // checkout.close()
                        console.log("successfully came from merchant");
                        $.ajax({
                            showLoader: true,
                            url: '/credpalpay/update/index',
                            data: {},
                            type: "GET",
                            dataType: 'json'
                        }).done(function (data) {
                            window.location.replace(mageUrl.build('checkout/onepage/success'));
                        });
                    }
                });

                checkout.setup();
                console.log('checkout-0op', checkout);

                checkout.open()

                // return checkout.open();
                // $.mage.redirect('redirectUrl');

                // return false;

            },
            checkout: function () {

            },
            success: function(code) {
                console.log('success-code', code)
            }
        });
    }
);
