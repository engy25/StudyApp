# User
## Order
###Order Details

### DisplayThe details of the order
Endpoint :/order-details?order_id=5
Method : Get

Headers:
order_id: the id of the order
Body :

----------
Authorization

BarearToken :
token of user

 Response


in case there is not orders or the order id right and the user doesnot belong to this user



  {
    "result": "failed",
    "message": "Not Found",
    "status": 401,
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
            "id": 3,
            "order_number": "q6TzH8jz3o9",
            "service_name": "سفر",
            "service_id": 2,
            "category_name": null,
            "category_id": null,
            "user_id": 4,
            "user_name": "Enjy",
            "user_image": "http://127.0.0.1:8000/storage/app/public/images/user/1709582409_kW2IVJnA6ybg.png",
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
            "When": "2024-02-27 15:11:58",
            "num_of_passengers": 3,
            "arrival_at": null,
            "distance": 2.25,
            "description_of_shipment": null,
            "payment_type": "cash",
            "transaction_id": null,
            "delivery_time": 200,
            "tax": 10,
            "expected_distance": 2.25,
            "expected_time": 10,
            "base_price": 10,
            "price_per_distance": 1,
            "price_per_minute": 60,
            "status": "YourTripHasBeenCompletedSuccessfully!",
            "created_at": "2024-02-26 13:12:27",
            "expected_salary": 401,
            "salary": 1812.25,
            "currency": "dollar",
            "notes": null,
            "statuses": [
                {
                    "id": 1,
                    "name": "pending "
                },
                {
                    "id": 2,
                    "name": "DriverConfirmed "
                },
                {
                    "id": 2,
                    "name": "DriverConfirmed "
                },
                {
                    "id": 7,
                    "name": "YourTripHasBeenCompletedSuccessfully!"
                },
                {
                    "id": 7,
                    "name": "YourTripHasBeenCompletedSuccessfully!"
                }
            ]
        }
    }
}
