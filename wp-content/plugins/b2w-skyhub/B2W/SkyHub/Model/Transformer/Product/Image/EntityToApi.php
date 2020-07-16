<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Luiz Tucillo <luiz.tucillo@e-smart.com.br>
 */

namespace B2W\SkyHub\Model\Transformer\Product\Image;

/**
 * Class EntityToApi
 * @package B2W\SkyHub\Model\Transformer\Product\Image
 */
class EntityToApi
{
    /**
     * @param $images
     * @param $parentTranformer
     * @return null
     */
    public function convert($images, $parentTranformer)
    {
        if (!$images) {
            return null;
        }

        /** @var \SkyHub\Api\EntityInterface\Catalog\Product $productInterface */
        $productInterface   = $parentTranformer->getInterface();

        /** @var \B2W\SkyHub\Model\Entity\CategoryEntity $category */
        foreach ($images as $img) {
            $productInterface->addImage($img);
        }

        return null;
    }
}
