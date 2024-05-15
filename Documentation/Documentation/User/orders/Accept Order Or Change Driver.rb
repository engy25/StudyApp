# User
## Order

### Accept Order Or Change Driver

Endpoint :/user-accept-order
Method : Post
Body :
"order_id":"required",
"accept":"required 1 or 0"
1 accept
0 change the driver
----------
Authorization

BarearToken :
token of the user

 Response

in case of not authentication

    {
        "result": "failed",
        "message": "Pleaze Login First",
        "status": 401,
        "data": null
    }

  in case of validation err

    {
    "result": "failed",
    "message": [
        "accept"
    ],
    "errors": {
        "accept": [
            "The selected accept is invalid."
        ]
    },
    "status": 422,
    "data": null
}


in case the order still not assigned driver

  {
    "result": "failed",
    "message": "No driver has been assigned yet",
    "status": 404,
    "data": null
}

in case accept ==0
  //mean change the driver of the order

  {
    "result": "success",
    "message": "You Changed The Driver Successfully",
    "status": 200,
    "data": null
}


 in case of success accept the driver

 Status :200 ok
 {
    "result": "success",
    "message": "you accepted the order successfully",
    "status": 200,
    "data": {
        "order": {
            "id": 79,
            "order_number": "SbtQgLpMbN",
            "service_name": "توصيله",
            "service_id": 1,
            "category_name": "اقتصادي",
            "category_id": 1,
            "user_id": 20,
            "user_name": "asdf",
            "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
            "driver_id": 18,
            "driver_name": "salahss",
            "driver_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
            "driver_car_brand": "toyota",
            "driver_car_photo": "http://127.0.0.1:8000/storage/app/public/images/vechilePhoto/1710619206_A2hYwK4Jzw7I.jpg",
            "from": "fuwa",
            "to": "kafrelsheikh",
            "from_lat": 31.2962871,
            "to_lat": 31.2942976,
            "from_lng": 30.5134602,
            "to_lng": 30.4898813,
            "num_of_passengers": 3,
            "payment_type": "cash",
            "transaction_id": null,
            "delivery_time": 0,
            "tax": 10,
            "expected_distance": 2.25,
            "expected_time": 0,
            "base_price": 15,
            "price_per_distance": 1,
            "price_per_minute": 60,
            "status": "UserConfirmed",
            "created_at": "2024-04-05 22:35:17",
            "expected_salary": 1817.25,
            "currency": "dollar",
            "notes": null,
            "statuses": [
                {
                    "id": 1,
                    "name": "pending"
                },
                {
                    "id": 2,
                    "name": "DriverConfirmed"
                },
                {
                    "id": 3,
                    "name": "UserConfirmed"
                }
            ]
        }
    }
}
