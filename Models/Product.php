<?php

class Product
{
   private $name;
   private $price;
   private $code;
   private $image;

   public function __construct($name, $price, $code, $image)
   {
      $this->name = $name;
      $this->price = $price;
      $this->code = $code;
      $this->image = $image;
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



}