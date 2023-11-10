<?php

class Line
{
  public $id;
  public $id_order;
  public $id_product;

  public function __construct($data)
  {
    $this->id = $data['id'];
    $this->id_order = $data['id_order'];
    $this->id_product = $data['id_product'];
  }
}
