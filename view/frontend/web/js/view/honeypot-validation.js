define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'HS_Honeypot/js/model/honeypot'
    ],
    function (Component, additionalValidators, honeypotValidator) {
        'use strict';
        additionalValidators.registerValidator(honeypotValidator);
        return Component.extend({});
    }
);
