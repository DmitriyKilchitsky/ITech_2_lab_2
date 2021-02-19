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
  $clients = $collection->find();
  ?>

  <div id="content_wrapper">
    <form action="./client_messages.php" method="post" class="first">
      <div>
        <h3>Сообщения от выбранного клиента</h3>
        <select name="client_name">
          <?php
          foreach ($clients as $client) {
            echo "<option value=\"$client[login]\">$client[login]</option>";
          }
          ?>
        </select>
        <br>
        <input type="submit" value="Получить">
        <div id="client_messages">
          <hr>
          <h4>Вы уже получали данные по этому клиенту</h4>
        </div>
      </div>
    </form>

    <form action="./total_traffic_stat.php" method="post" class="second">
      <div>
        <h3>Общая статистика работы в сети</h3>
        <input type="submit" value="Получить">
      </div>
    </form>

    <form action="./negative_balance.php" method="post" class="third">
      <div>
        <h3>Вывести список клиентов с отрицательным балансом счета</h3>
        <input type="submit" value="Вывести">
      </div>
    </form>
  </div>
</body>
<script src="./assets/index.js"></script>

</html>