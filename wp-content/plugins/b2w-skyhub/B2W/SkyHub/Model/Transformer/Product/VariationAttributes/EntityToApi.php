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

namespace B2W\SkyHub\Model\Transformer\Product\VariationAttributes;

use B2W\SkyHub\Model\Resource\Collection;

/**
 * Class EntityToApi
 * @package B2W\SkyHub\Model\Transformer\Product\VariationAttribute
 */
class EntityToApi
{
    /**
     * @param Collection $collection
     * @param $parentTransformer
     * @return null
     */
    public function convert(Collection $collection, $parentTransformer)
    {
        /** @var \SkyHub\Api\EntityInterface\Catalog\Product $productInterface */
        $productInterface = $parentTransformer->getInterface();

        /** @var \B2W\SkyHub\Model\Entity\Product\AttributeEntity $attribute */
        foreach ($collection as $attribute) {
            if (!$attribute) {
                continue;
            }

            if (!($attribute instanceof \B2W\SkyHub\Model\Entity\Product\AttributeEntity)) {
                continue;
            }

            if (!$attribute->getOption()) {
                $code = $attribute->getAttribute();
            } else {
                $code = $attribute->getCode();
            }
            $productInterface->addVariationAttribute($code);
        }

        return null;
    }
}
