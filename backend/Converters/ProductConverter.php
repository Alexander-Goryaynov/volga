<?php

namespace Backend\Converters;

use Backend\Responses\ProductResponse;

class ProductConverter
{
    public static function convertToJson(int $id, array $product): ProductResponse
    {
        $result = new ProductResponse();
        $result->product_id = $id;
        $result->product_code = $product['Product code'];
        $result->language = $product['Language'];
        $result->category = explode('///', $product['Category']);
        $result->list_price = $product['List price'];
        $result->price = $product['Price'];
        $result->quantity = $product['Quantity'];
        $result->name = $product['Product name'];
        $result->description = $product['Description'];
        $result->seo_name = $product['SEO name'];
        $result->short_description = $product['Short description'];
        $result->status = $product['Status'];
        $result->vendor = $product['Vendor'];
        foreach (explode(';', $product['Features']) as $pair) {
            $pair = trim($pair);
            $pairParts = explode(': ', $pair);
            $key = $pairParts[0];
            $valueWithType = $pairParts[1];
            $value = mb_substr($valueWithType, 2, mb_strlen($valueWithType) - 3);
            $result->product_features[$key] = $value;
        }
        return $result;
    }
}