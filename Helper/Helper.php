<?php

namespace Dubslack\CheckoutThumbnail\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\UrlInterface;
use Magento\Catalog\Helper\Image;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Helper extends \Magento\Framework\App\Helper\AbstractHelper
{
    const DUBSLACK_THUMBNAIL_CONFIG = 'checkout/dubslack';
    const DUBSLACK_THUMBNAIL_PATH = 'catalog/cart/thumbnail/';
    const PRODUCT_PLACEHOLDER_THUMBNAIL = 'catalog/placeholder/thumbnail_placeholder';


    const THUMBNAIL_SRC = "thumbnail";
    const THUMBNAIL_WIDTH = "width";
    const THUMBNAIL_HEIGHT = "height";
    const THUMBNAIL_ALT = "alt";

    private string|null $src;
    private string $width;
    private string $height;
    private string $alt;

    public function __construct(
        Context                                $context,
        private readonly StoreManagerInterface $storeManager,
        private readonly Image                 $imageHelper
    )
    {
        parent::__construct($context);

        // see if an image is picked in the system settings or default to the product thumbnail placeholder
        if ($imagePlaceholder = $this->scopeConfig->getValue(self::DUBSLACK_THUMBNAIL_CONFIG . '/' . self::THUMBNAIL_SRC, ScopeInterface::SCOPE_STORE)) {
            try {
                $this->src = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . self::DUBSLACK_THUMBNAIL_PATH . $imagePlaceholder;
            } catch (\Exception $e) {
            }
        } else {
            $this->src = $this->imageHelper->getDefaultPlaceholderUrl('thumbnail');;
        }

        $this->width = $this->scopeConfig->getValue(self::DUBSLACK_THUMBNAIL_CONFIG . '/' . self::THUMBNAIL_WIDTH, ScopeInterface::SCOPE_STORE) ?? "75";
        $this->height = $this->scopeConfig->getValue(self::DUBSLACK_THUMBNAIL_CONFIG . '/' . self::THUMBNAIL_HEIGHT, ScopeInterface::SCOPE_STORE) ?? "75";
        $this->alt = $this->scopeConfig->getValue(self::DUBSLACK_THUMBNAIL_CONFIG . '/' . self::THUMBNAIL_ALT, ScopeInterface::SCOPE_STORE) ?? "";
    }

    /**
     * @return bool|array
     */
    public function getThumbnail(): bool|array
    {
        if ($this->src) {
            return ['src' => $this->src, 'width' => (int)$this->width * 2, 'height' => (int)$this->height * 2, 'alt' => $this->alt];
        }
        return false;
    }

}
