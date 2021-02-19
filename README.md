# Лабораторная работа №2. Нереляционная СУБД MongoDB и хранение данных на стороне клиента
## Создание коллекций:
```mongo
db.createCollection('client')
db.createCollection('seance')
```

## Заполение коллекций:
### Данные клиентов
```mongo
db.client.insert(
  [
    {
      "login": "user1",
      "password": "qwerty123",
      "ip": "79.151.83.26",
      "balance": 120,
      "messages": [
        "Hello guys!",
        "When were the first Olympic games?",
      ],
    },
    {
      "login": "user2",
      "password": "1234567890",
      "ip": "10.29.133.86",
      "balance": -10,
      "messages": [
        "I don't know.",
        "Do you chat on Facebook?",
        "No!",
      ],
    },
    {
      "login": "user3",
      "password": "qwerty",
      "ip": "200.224.8.98",
      "balance": 0,
      "messages": [
        "Do you want to get married?",
      ],
    },
  ]
)
```

### Данные сеансов
```mongo
db.seance.insert(
  [
    {
      "start": ISODate("2021-01-20T20:05:30.52Z"),
      "stop": ISODate("2021-01-20T21:50:09.52Z"),
      "in_traffic": 1500,
      "out_traffic": 100,
      "ip": "79.151.83.26",
      "seance_cost": 5
    },
    {
      "start": ISODate("2021-01-24T20:14:05.00Z"),
      "stop": ISODate("2021-01-20T21:14:05.00Z"),
      "in_traffic": 500,
      "out_traffic": "null",
      "ip": "79.151.83.26",
      "seance_cost": 9
    },
    {
      "start": ISODate("2021-01-21T13:37:37.00Z"),
      "stop": ISODate("2021-01-22T21:18:07.00Z"),
      "in_traffic": 650,
      "out_traffic": 700,
      "ip": "10.29.133.86",
      "seance_cost": 2
    },
    {
      "start": ISODate("2021-01-29T09:59:18.00Z"),
      "stop": ISODate("2021-01-29T16:46:02.00Z"),
      "in_traffic": 255,
      "out_traffic": 50,
      "ip": "79.151.83.26",
      "seance_cost": 2
    },
    {
      "start": ISODate("2021-01-30T02:46:31.00Z"),
      "stop": ISODate("2021-01-30T14:02:32.00Z"),
      "in_traffic": 1600,
      "out_traffic": 400,
      "ip": "200.224.8.98",
      "seance_cost": 3
    },
    {
      "start": ISODate("2021-01-26T06:04:37.00Z"),
      "stop": ISODate("2021-01-26T18:18:17.00Z"),
      "in_traffic": 4500,
      "out_traffic": 500,
      "ip": "79.151.83.26",
      "seance_cost": 6
    },
    {
      "start": ISODate("2021-01-31T06:43:53.00Z"),
      "stop": ISODate("2021-01-31T09:52:44.00Z"),
      "in_traffic": 120,
      "out_traffic": "null",
      "ip": "10.29.133.86",
      "seance_cost": 8
    },
    {
      "start": ISODate("2021-01-26T07:37:21.00Z"),
      "stop": ISODate("2021-01-26T23:16:05.00Z"),
      "in_traffic": 650,
      "out_traffic": 2500,
      "ip": "79.151.83.26",
      "seance_cost": 10
    },
    {
      "start": ISODate("2021-01-31T05:20:10.00Z"),
      "stop": ISODate("2021-01-31T05:45:15.00Z"),
      "in_traffic": 900,
      "out_traffic": "null",
      "ip": "10.29.133.86",
      "seance_cost": 3
    },
    {
      "start": ISODate("2021-01-27T13:15:08.00Z"),
      "stop": ISODate("2021-01-27T14:52:49.00Z"),
      "in_traffic": 95,
      "out_traffic": 5500,
      "ip": "79.151.83.26",
      "seance_cost": 7
    },
    {
      "start": ISODate("2021-01-23T09:19:03.00Z"),
      "stop": ISODate("2021-01-24T01:19:03.00Z"),
      "in_traffic": 450,
      "out_traffic": 10000,
      "ip": "200.224.8.98",
      "seance_cost": 14
    },
  ]
)
```
***
## Для выполнения задачи поставленной в лабораторной работе, за основу были взяты следующие запросы:
- ### Получение сообщений от выбранного клиента:
  ```mongo
  db.client.find({login: "user1"}, {messages: true, _id: false}).pretty()
  ```
- ### Получение общего входящего и исходящего трафика:
  ```mongo
  db.seance.aggregate([{ $group: { _id: "null", total: { $sum: "$in_traffic" } } }]) - in_traffic sum
  db.seance.aggregate([{ $group: { _id: "null", total: { $sum: "$out_traffic" } } }]) - out_traffic sum
  ```
- ### Вывод списка клиентов с отрицательным балансом счета:
  ```mongo
  db.client.find({balance: {$lt: 0}}, {login: true, _id: false}).pretty()
  ```
