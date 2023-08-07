<h1 align="center">Dubslack_CheckoutThumbnail</h1> 

<div align="center">
  <p>Magento 2 module for setting a fallback/default thumbnail image in the cart's items</p>
  <img src="https://img.shields.io/badge/magento-2.4-brightgreen.svg?logo=magento&longCache=true&style=flat-square" alt="Supported Magento Versions" />
  <a href="https://packagist.org/packages/mikedubinsky/magento2-module-checkout-thumbnail" target="_blank"><img src="https://img.shields.io/packagist/v/mikedubinsky/magento2-module-checkout-thumbnail.svg?style=flat-square" alt="Latest Stable Version"/></a>
  <img src="https://img.shields.io/badge/PHP-8+-orange"  alt="PHP 8+"/>
  <a href="https://opensource.org/licenses/MIT" target="_blank"><img src="https://img.shields.io/badge/license-MIT-blue.svg" /></a>
</div>

## Table of contents

- [Summary](#summary)
- [Purpose](#purpose)
- [Installation](#installation)
- [Usage](#usage)
- [Future](#future)
- [License](#license)

## Summary

This module will help make sure that all items in the customer's checkout process have a thumbnail image.

If your thumbnail images are working correctly in your Magento checkout, then you probably don't need this extension. 

## Purpose

The product images are loaded to window.checkoutConfig.imageData when /checkout is visited.

If you are adding a product during the checkout process programmatically, then its image may not show up until a page refresh.

This package solves that, by at least providing the "Product Image Placeholder (Thumbnail)", or the specific image of your choosing as a fallback option.

## Installation

```
composer require mikedubinsky/magento2-module-checkout-thumbnail
bin/magento module:enable Dubslack_CheckoutThumbnail
bin/magento setup:upgrade
```

## Usage

Simply installing this module ensures that in the absence of a thumbnail image, Magento's placeholder image is used, but you may further configure this extension: 

### Configuring Your Own Thumbnail Image

To configure your own thumbnail , visit **Admin > Stores > Settings > Configuration > Sales > Checkout > Checkout Item Thumbnail. Here you can:
- Upload your own image
- Specify width, height, and alternate text

## Future
Submit an issue if you have a feature request that you want me to add, but I also have the following ideas in mind:
- build on this extension to dynamically look up and store an array of product images
- have an option to FORCE THUMBNAIL incase someone wants to simply override existing thumbnails

## License

[MIT](https://opensource.org/licenses/MIT)