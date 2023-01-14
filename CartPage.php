<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="CSS/style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,regular,500,700&display=swap&subset=cyrillic-ext" rel="stylesheet" />
   <title>Корзина</title>
</head>
<body>
<div class="container">
   <header>
      <div class="nav__bar">
         <a class="nav__link" href="index.php">Назад</a>
      </div>
   </header>
   <main class="product__container">
      <?php

      echo '<div >result = '.$_SESSION['testResult1'].'</div>';
      ?>
   </main>
</div>
</body>
</html>
