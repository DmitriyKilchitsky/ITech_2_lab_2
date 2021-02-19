<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./assets/index.css">
  <title>Document</title>
</head>

<body>
  <?php
  require './vendor/autoload.php';
  $collection  = (new MongoDB\Client)->dbforlab->client;
  $clients = $collection->find(
    array('balance' => array('$lt' => 0))
  )->toArray();
  ?>

  <div id="content_wrapper">
    <h3>Список клиентов с отрицательным балансом счета:</h3>
    <div>
      <?php
      foreach ($clients as $client) {
        echo "<p>&#8211 $client[login]</p>";
      }
      ?>
    </div>
  </div>
</body>

</html>