<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Bucketlist</title>
</head>

<body>
  <div class="container">
   <header class="header">
      <h1 class="header__title">Things to do <br> before turning 30</h1>

      <?php if ($_GET['page'] === 'detail'): ?>
        <h2 class="detail__title"><?php echo $item['title'];?></h2>
      <?php endif;?>

      <?php if ($_GET['page'] === 'home'): ?>
      <a class="btn btn-test" href="index.php?page=test">Personality test</a>
      <?php endif;?>

  </header>

    <main>
      <?php echo $content; ?>
    </main>

  </div>

  <script src="js/script.js"></script>
</body>

</html>
