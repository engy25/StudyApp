# User
## Order
###get orders سجل الطلبات

### Display All The orders of the user
Endpoint :/get-orders
Method : Get
Body :

----------
Authorization

BarearToken :
token of user

 Response


in case there is not orders



  {
    "result": "success",
    "message": "Order Retreived Successfully",
    "status": 200,
    "data": {
        "orders": []
    }
}

 in case of success
 Status :200 ok
 {
    "result": "success",
    "message": "Order Retreived Successfully",
    "status": 200,
    "data": {
        "orders": [
            {
                "id": 38,
                "order_number": "Ksaafbn4gL",
                "from": "fuwa",
                "to": "kafrelsheikh",
              
                "from_lat": 31.2962871,
                "to_lat": 31.2942976,
                "from_lng": 30.5134602,
                "to_lng": 30.4898813,
                "status": "YourTripHasBeenCompletedSuccessfully!",
                "created_at": "2024-03-28 19:26:46",
                "expected_salary": 162.25,
                "salary": 200
            }
        ]
    }
}

