<?php
/**
 * Softnoesis
 * Copyright(C) 21/2022 Softnoesis <contact@softnoesis.com>
 * @package Softnoesis_ProductBrand
 * @copyright Copyright(C) 2015 Softnoesis (contact@softnoesis.com)
 * @author Softnoesis <contact@softnoesis.com>
 */
namespace Softnoesis\ProductBrand\Plugin;

use Magento\Quote\Model\Quote\Item;

class DefaultItem
{
    public function aroundGetItemData($subject, \Closure $proceed, Item $item)
    {
        $data = $proceed($item);
        $product = $item->getProduct();

        $atts = [
            "product_manufacturer" => $product->getAttributeText('manufacturer')
        ];

        return array_merge($data, $atts);
    }
}
