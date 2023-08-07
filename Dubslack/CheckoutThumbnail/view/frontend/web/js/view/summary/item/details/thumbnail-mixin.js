/**
 * Mixin to add a default thumbnail image to: magento/module-checkout/view/frontend/web/js/view/summary/item/details/thumbnail.js
 */

define([], function () {
    'use strict';

    const mixin = {

        getSrc: function (item) {
            return this._super() || this.imageData['default']?.src || null;
        },
        getWidth: function (item) {
            return this._super() || this.imageData['default']?.width || null;
        },
        getHeight: function (item) {
            return this._super() || this.imageData['default']?.height || null;
        },
        getAlt: function (item) {
            return this._super() || this.imageData['default']?.alt || null;
        }

    };

    return function (target) {
        return target.extend(mixin);
    };
});
