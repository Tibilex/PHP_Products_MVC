<?php

class Product
{
   private $id;
   private $name;
   private $price;
   private $code;
   private $image;


   public function __construct($id, $name, $price, $code, $image)
   {
      $this->id = $id;
      $this->name = $name;
      $this->price = $price;
      $this->code = $code;
      $this->image = $image;
   }

   function getId(){
      return $this->id;
   }
   function setId($price){
      $this->id = $price;
   }

   function getPrice(){
      return $this->price;
   }
   function setPrice($price){
      $this->price = $price;
   }

   function getCode(){
      return $this->code;
   }
   function setCode($code){
      $this->code = $code;
   }

   function getName() {
      return $this->name;
   }
   function setName($name) {
      $this->name = $name;
   }

   function getImage() {
      return $this->image;
   }
   function setImage($image) {
      $this->image = $image;
   }

   public function __destruct()
   {
      unset($this->id);
      unset($this->name);
      unset($this->code);
      unset($this->image);
      unset($this->price);
   }
}