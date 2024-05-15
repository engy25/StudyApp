# User
## Order

###Get THe Driver Of THe Order

Endpoint :/order-data-driver/3
3 order_id
Method : get
Body :

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

  in case of order_id not found or this order not belong to this user

    {
      "result": "failed",
      "message": "Not Found",
      "status": 401,
      "data": null
  }
in case of and the driver  still not assigned

  {
    "result": "failed",
    "message": "Driver Still Not Assigned To This Order",
    "status": 422,
    "data": null
}

in case the driver not assigned and the order created_at 10 m ago
  {
    "result": "failed",
    "message": "Driver not assigned order expired",
    "status": 422,
    "data": null
}


 in case of success

 Status :200 ok


 {
    "result": "success",
    "message": "Order Retreived Successfully",
    "status": 200,
    "data": {
        "order": {
            "id": 37,
            "order_number": "LOzNAOejiN",
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
            "arrival_at": null,
            "payment_type": "cash",
            "transaction_id": null,
            "delivery_time": 0,
            "tax": 10,
            "expected_distance": 2.25,
            "expected_time": 0,
            "base_price": 10,
            "price_per_distance": 1,
            "price_per_minute": 5,
            "status": "pending ",
            "created_at": "2024-03-28 00:41:22",
            "expected_salary": 162.25,
            "currency": "dollar",
            "notes": null,
            "statuses": [
                {
                    "id": 1,
                    "name": "pending "
                }
            ]
        }
    }
}
