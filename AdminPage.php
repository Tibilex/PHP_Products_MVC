<?php
include_once (__DIR__ . '/Controllers/ProductController.php');
$productController = new ProductController();
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="CSS/style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,regular,500,700&display=swap&subset=cyrillic-ext" rel="stylesheet" />
   <title>Админ Панель</title>
</head>
<body>
<div class="container">
   <header>
      <div class="nav__bar">
         <a class="nav__link" href="index.php">Назад</a>
      </div>
   </header>
   <main class="product__container">
      <div class="input__container">
         <div >
         <form enctype="multipart/form-data" class="form__container" method="post" action="AdminPage.php">
            <label for="prodName">Имя:</label>
            <label>
               <input name="prodName" type="text">
            </label>
            <label for="prodPrice">Цена:</label>
            <label>
               <input name="prodPrice" type="text">
            </label>
            <label for="prodCode">Код товара:</label>
            <label>
               <input name="prodCode" type="text">
            </label>
               <label for="prodImage">Изображение:</label>
               <input name="file" type="file" accept="image/png, image/svg, image/jpeg, image/jpg">
               <button class="item__btn pos" type="submit" name="addBtn">Добавить товар</button>
            <?php

            if(isset($_POST['delBtn'])){
               $productController->RemoveItem();
            }
            if(isset($_POST['addBtn'])){
               $pName = $_POST['prodName'];
               $pPrice = $_POST['prodPrice'];
               $pCode = $_POST['prodCode'];
               //$pImage = $_POST['prodImage'];
               $pImage = $_FILES['file']['name'];
               $productController->AddProduct($pName, $pPrice, $pCode, $pImage);
            }
            if(isset($_POST['editBtn'])){
               $pName = $_POST['itemName'];
               $pPrice = $_POST['itemPrice'];
               $pCode = $_POST['itemCode'];
               $pImage = $_POST['itemImg'];
               $productController->UpdateItem($pName, $pPrice, $pCode, $pImage);
            }
            ?>
         </form>
         <div class="search__container">
            <form class="form__container">
               <label for="searchInput">Поиск по названию:</label>
               <input name="searchInput" type="text">
               <button class="item__btn pos enabled" type="submit" name="addBtn">Поиск!</button>

               <?php
               /*
               if(isset($_POST['searchInput'])){
                  $productController->Search('searchInput');
               }
               */
               ?>

            </form>
         </div>
         </div>
      </div>
      <div class="product__container product__container--size">
         <?php
         $connectionString = new mysqli("localhost", "root", "", "education");
         if($connectionString->connect_error){
            echo 'ERROR';
         }
         else{
            $request = "SELECT * FROM `product_1`";

            if($results = $connectionString->query($request)) {
               foreach ($results as $res){
                  $products = new ProductController();
                  $products->setProduct($res["id"], $res["name"], $res["price"], $res["code"], $res["image"]);
                  echo $products->BuildProductTileAdmin();
               }
               $results->free();
            }
            else {
               echo '<p>Data NOT selected!</p>';
            }
         }
         $connectionString->close();
         ?>
      </div>

   </main>
</div>
</body>
</html>
