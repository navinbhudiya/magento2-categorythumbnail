<?php

namespace Navin\Categorythumbnail\Helper;



class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    protected $_storeManager;

    public function __construct(\Magento\Framework\App\Helper\Context $context, \Magento\Store\Model\StoreManagerInterface $storeManager) {
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }


    public function getCategoryThumbUrl($category) {
        $url = false;
//        custom_image
        $image = $category->getCustomImage();
        if ($image) {
            if (is_string($image)) {
                $url = $this->_storeManager->getStore()->getBaseUrl(
                                \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                        ) . 'catalog/category/' . $image;
            } else {
                throw new \Magento\Framework\Exception\LocalizedException(
                __('Something went wrong while getting the image url.')
                );
            }
        }

        return $url;
    }

}
