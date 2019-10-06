define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('hs.honeypot', {
        options: {
            forms: [],
        },

        /**
         * Add field to matched forms.
         * @private
         */
        _create: function () {
            var self = this,
                stop = 0;
            $(function () {
                var forms  = self.options.forms;
                forms.forEach(function (element) {
                    if (element !== '' && $(element).length > 0 && $(element).prop("tagName").toLowerCase() === 'form') {
                        $(element).append($('<input />').attr({
                            type: 'hidden',
                            name: 'hs_hid',
                            value: ''
                        }));
                    }
                });
            });
        }
    });

    return $.hs.honeypot;
});
