<?php
class Item {
  public $img;
  public $name;
  public $description;
  public $dimension;
  public $price;
  public $ceramist;
  public $category;
  public $quantity=0;

  function __construct($img, $name, $description, $dimension, $price, $ceramist, $category) {
      $this->img = $img;
      $this->name = $name;
      $this->description = $description;
      $this->dimension = $dimension;
      $this->price = $price;
      $this->ceramist = $ceramist;
      $this->category = $category;
  }
}
?>