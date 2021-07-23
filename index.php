<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script defer src="theme.js"></script>
  
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/style2.css" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />

  <title>Explore</title>
</head>

<body>
  <header>
    <h1><span  style="cursor: pointer;" onclick="window.location.href='index.php'">Explorer</span></h1>
  </header>
  <?php require 'navbar.php'; ?>
  <main>
    <?php
    if (isset($_GET['tab'])) {
      switch ($_GET['tab']) {
        case 'rover':
          require './tabs/rover_images.php';
          break;
        case 'apod':
          require './tabs/apod.php';
          break;
        case 'weather':
          require './tabs/weather.php';
          break;
        default:
          echo "<h1>Error !</h1>";
      }
    } else {
    ?>
      <div class="hero">
        <img src="./img/background.jpg" alt="explore">
        <div class="hero_inner">
          <img src="./img/logo.svg" alt="">
          <p>TAKE THE WORLD FROM ANOTHER POINT OF VIEW</p>
        </div>
      </div>
      <?php
    }
      ?>
  </main>

</body>

</html>