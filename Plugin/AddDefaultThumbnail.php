<?php

namespace Dubslack\CheckoutThumbnail\Plugin;

use Magento\Checkout\Model\Cart\ImageProvider;
use Dubslack\CheckoutThumbnail\Helper\Helper;

class AddDefaultThumbnail
{
    public function __construct(
        private readonly Helper $helper
    )
    {
    }

    public function afterGetImages(ImageProvider $subject, array $result): array
    {
        if ($thumbnail = $this->helper->getThumbnail()) {
            $result['default'] = $thumbnail;
        }

        return $result;
    }
}
