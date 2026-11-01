<?php
class Product {
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public string $category;

    public function __construct(int $id, string $name, string $desc, float $price, string $category) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
        $this->category = $category;
    }
}
