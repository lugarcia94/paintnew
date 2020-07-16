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

namespace B2W\SkyHub\Model\Repository;

use B2W\SkyHub\Contract\Entity\CategoryEntityInterface;
use B2W\SkyHub\Contract\Repository\CategoryRepositoryInterface;
use B2W\SkyHub\Model\Resource\Collection;
use B2W\SkyHub\Model\Entity\CategoryEntity;
use B2W\SkyHub\Model\Resource\Select;
use stdClass;

/**
 * Class CategoryDbRepository
 * @package B2W\SkyHub\Model\Repository
 */
class CategoryDbRepository implements CategoryRepositoryInterface
{
    /**
     * @param $id
     * @return CategoryEntityInterface|mixed
     */
    public function one($id)
    {
        global $wpdb;

        $select     = $this->_getSelect();
        $select->where('term_taxonomy_id = %s');

        $query      = $wpdb->prepare($select->prepare(), $id);
        $results    = $wpdb->get_results($query);

        foreach ($results as $result) {
            $category = new CategoryEntity();
            $category->setId($result->term_taxonomy_id)
                ->setCode($result->slug)
                ->setName($result->name);

            if ($result->parent) {
                $category->setParent(self::one($result->parent));
            }

            return $category;
        }

        return new CategoryEntity();
    }

    /**
     * @param \B2W\SkyHub\Contract\Entity\ProductEntityInterface $product
     * @return Collection|mixed
     */
    public function load(\B2W\SkyHub\Contract\Entity\ProductEntityInterface $product)
    {
        global $wpdb;

        $select = $this->_getSelect();
        $select->join(
            'term_relationships',
            "relations.term_taxonomy_id = main_table.term_taxonomy_id
                AND relations.object_id = {$product->getId()}",
            'relations'
        );
        $select->group('main_table.term_taxonomy_id');

        $results = $wpdb->get_results($select->prepare());
        $data = $this->prepareDataToCollection($results);

        $collection = new Collection();
        foreach ($data as $categoryEntity) {
            $collection->addItem($categoryEntity);
        }
        return $collection;
    }

    /**
     * Undocumented function
     *
     * @param stdClass $results
     * @return array
     */
    protected function prepareDataToCollection($results)
    {
        $parentCollection = [];
        foreach ($results as $result) {
            $id = $result->term_taxonomy_id;
            $category[$id] = new CategoryEntity();
            $category[$id]->setId($id)
                          ->setCode($result->slug)
                          ->setName($result->name);

            if (!$result->parent) {
                continue;
            }
            
            $parentId = $result->parent;
            if (isset($category[$parentId])) {
                $category[$id]->setParent($category[$parentId]);
                $parentCollection[$parentId] = $category[$parentId];
                unset($category[$parentId]);
            } elseif (isset($parentCollection[$parentId])) {
                $category[$id]->setParent($parentCollection[$parentId]);
            } else {
                $parentCollection[$parentId] = $this->one($parentId);
                $category[$id]->setParent($parentCollection[$parentId]);
            }
        }
        return $category;
    }

    /**
     * @return Select|string
     */
    protected function _getSelect()
    {
        $select = new Select();

        $select->column('main_table.term_taxonomy_id')
            ->column('terms.name')
            ->column('terms.slug')
            ->column('main_table.parent');

        $select->from('term_taxonomy', 'main_table');

        $select->join('terms', 'terms.term_id = main_table.term_id', 'terms');

        $select->where("taxonomy = 'product_cat'");

        return $select;
    }
}
