<?php
class Product{
    
    const ATTR_PRODUCT_ID = "ATTR_PRODUCT_ID";
    const ATTR_PRODUCT_NAME = "ATTR_PRODUCT_NAME";
    const ATTR_PRODUCT_DESCRIPTION = "ATTR_PRODUCT_DESCRIPTION";
    const ATTR_PRODUCT_PRICE = "ATTR_PRODUCT_PRICE";
    
    // ATTRIBUTES
    protected int $id = -1;
    protected string $name = "", $description = "";
    protected float $price = 12.95;

    // Getter para id
    public function getId(): int {
        return $this->id;
    }

    // Setter para id
    public function setId(int $id): void {
        $this->id = $id;
    }


    // Getter para price
    public function getPrice(): float {
        return $this->price;
    }

    // Setter para price
    public function setPrice(int $price): void {
        $this->price = $price;
    }


    // Getter para name
    public function getName(): string {
        return $this->name;
    }

    // Setter para name
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Getter para description
    public function getDescription(): string {
        return $this->description;
    }

    // Setter para description
    public function setDescription(string $description): void {
        $this->description = $description;
    }

}
