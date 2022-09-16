<?php

namespace Backend\Responses;

class ProductResponse
{
    public int $product_id;
    public string $product_code;
    public string $language;
    /** @var string[] $category */
    public array $category = [];
    public string $list_price;
    public float $price;
    public int $quantity;
    public string $name;
    public string $description;
    public string $seo_name;
    public string $short_description;
    public string $status;
    public string $vendor;
    public array $product_features = [];
}