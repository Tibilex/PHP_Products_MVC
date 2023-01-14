<?php
include './Models/Product.php';

class ProductController
{
   private $product;

   function setProduct($id, $name, $price, $code, $image)
   {
      $this->product = new Product($id, $name, $price, $code, $image);
   }

   public function BuildProductTile(){
      return "<div class='item__container'>".
         "<div class='item__code'>Код товара:".$this->product->getcode()."</div>".
         "<div class='item__img'>"."<img src=".$this->product->getImage()." alt='img'>"."</div>".
         "<div class='item__name'>".$this->product->getName()."</div>".
         "<div class='item__price-text'>Цена:"."</div>".
         "<div class='item__price'>".$this->product->getPrice()." грн</div>".
         "<button class='item__btn' type='submit' name='buyBtn'>Купить</button>".
         "</div>";
   }

   public function BuildProductTileAdmin(){
      return
         "<div class='_admin__container'>".
         "<form class='edit__form' method='post' enctype='multipart/form-data'".
         "<p name='itemId'>ID: ".$this->product->getId()."</p>".
         "<label for='itemName'>Название товара:</label>".
         "<textarea name='itemName'>".$this->product->getName()."</textarea>".
         "<label for='itemPrice'>Цена товара:</label>".
         "<textarea name='itemPrice'>".$this->product->getPrice()."</textarea>".
         "<label for='itemCode'>Код Товара:</label>".
         "<textarea name='itemCode'>".$this->product->getCode()."</textarea>".
         "<label for='itemImg'>Путь Изображения:</label>".
         "<textarea name='itemImg'>".$this->product->getImage()."</textarea>".
         "<button type='submit' value=".$this->product->getId()." name='editBtn'>Редактировать</button>".
         "<button type='submit' value=".$this->product->getId()." name='delBtn'>Удалить</button>".
         "</form>".
         "</div>";
   }

   public function AddProduct($name, $price, $code, $image)
   {

      $path = '/Img/';
      $fullPath = "{$path}{$image}";

      $connectionString = new mysqli("localhost", "root", "", "education");
      if (isset($_POST['prodName']) && isset($_POST['prodPrice']) && isset($_POST['prodCode'])){
         if($connectionString->connect_error){
            echo "error";
         }
      else{
         $data = 'INSERT INTO `product_1`(`name`, `price`, `code`, `image`) VALUES ("'.$name.'" , "'.$price.'", "'.$code.'", "'.$fullPath.'")';
         if($connectionString->query($data)){
            return "<p>Data added!</p>";
         }
         else{
            return "<p>Data not added!</p>";
         }
         $connectionString->close();
      }
      }
   }

   public function RemoveItem()
   {
      if(isset($_POST['delBtn']))
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo "error";
      }
      else{
         $itemId = $_POST['delBtn'];
         $request = 'DELETE FROM product_1 WHERE id="'.$itemId.'"';

         if($connectionString->query($request)){
            $connectionString->close();
            echo "<script>document.location = './AdminPage.php';</script>";
         }
         else{
            $connectionString->close();
            echo "<script>document.location = './AdminPage.php';</script>";
         }
      }
   }

   public function UpdateItem($name, $price, $code, $image)
   {
      if (isset($_POST['editBtn'])) {
         $connectionString = new mysqli("localhost", "root", "", "education");
         if ($connectionString->connect_error) {
            echo "error";
         }
         else {
            $itemId = $_POST['editBtn'];

            $request = 'UPDATE product_1 SET name="'.$name.'", price="'.$price.'", image="'.$image.'", code="'.$code.'" WHERE id="'.$itemId.'"';

            if($connectionString->query($request)){
               $connectionString->close();
               echo "<script>document.location = './AdminPage.php';</script>";
            }
            else{
               $connectionString->close();
               echo "<script>document.location = './AdminPage.php';</script>";
            }
         }
      }
   }
}