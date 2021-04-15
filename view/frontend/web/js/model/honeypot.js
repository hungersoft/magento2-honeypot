define(
    ['jquery', 'mage/translate', 'Magento_Ui/js/model/messageList'],
    function ($, $t, messageList) {
        'use strict';
        return {
            validate: function () {
                var val = $('#hs_payment_hid').val();
                if (val) {
                    messageList.addErrorMessage({ message: $t('Invalid request') });
                }

                return val == false;
            }
        }
    }
);
