<?php
namespace Navin\Categorythumbnail\Model\Category;
class DataProvider extends \Magento\Catalog\Model\Category\DataProvider {

    protected function getFieldsMap() {
        $fields = parent::getFieldsMap();
        $fields['content'][] = 'custom_image'; // custom image field

        return $fields;
    }

    public function getCategoryThumbUrl($category) {
        $url = false;
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
