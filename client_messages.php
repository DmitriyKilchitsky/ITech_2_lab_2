<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./assets/index.css">
  <title>Document</title>
</head>

<body>
  <?php
  $client_name = "$_POST[client_name]";

  require './vendor/autoload.php';
  $collection  = (new MongoDB\Client)->dbforlab->client;
  $client = $collection->find(['login' => $client_name])->toArray()[0];
  $messages = $client['messages'];
  ?>

  <div id="content_wrapper">
    <?php
    echo "<h3>Сообщения от клиента <span id=\"client_name\">$client_name</span>:</h3>";
    foreach ($messages as $message) {
      echo "<p>&#8211 $message</p>";
    }
    ?>
  </div>
</body>
<script src="./assets/client_messages.js"></script>

</html>