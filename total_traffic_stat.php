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
  $collection  = (new MongoDB\Client)->dbforlab->seance;
  $total_usage = $collection->aggregate(array(
    array(
      '$group' => array(
        '_id' => null,
        'total_in_traffic' => array('$sum' => '$in_traffic'),
        'total_out_traffic' => array('$sum' => '$out_traffic'),
      )
    )
  ))->toArray()[0];
  ?>

  <div id="content_wrapper">
    <h3>Общая статистика работы в сети:</h3>
    <?php
    echo "<p>Количество входящего трафика &#8212 $total_usage[total_in_traffic] KB</p>";
    echo "<p>Количество исходящего трафика &#8212 $total_usage[total_out_traffic] KB</p>";
    ?>
  </div>
</body>

</html>