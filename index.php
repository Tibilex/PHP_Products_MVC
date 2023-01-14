<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="./CSS/style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,regular,500,700&display=swap&subset=cyrillic-ext" rel="stylesheet" />
   <title>Shop</title>
</head>
<body>
<div class="container">
   <header>
      <div class="nav__bar">
         <a class="nav__link" href="AdminPage.php">Админ панель</a>
         <a class="nav__link" href="CartPage.php">Корзина</a>
      </div>
   </header>
   <main class="product__container">
      <?php
      include 'Controllers/ProductController.php';
      $products = new ProductController();

      if(isset($_POST['buyBtn'])){
         $itemId = $_POST['buyBtn'];
         $products->AddToCart($itemId);
      }

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
                echo $products->BuildProductTile();
            }
            $results->free();
         }
         else {
            echo '<p>Data NOT selected!</p>';
         }
      }
      $connectionString->close();
      ?>
   </main>
</div>
</body>
</html>