# User
## Order

### Cancel Order

Endpoint :/cancel-order
Method : Post
Body :
"order_id":"required",
"cancel_reason":"not required maximum:500 letters"
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
      "status": 404,
      "data": null
  }
in case the status of the order DriverIsWaitingYou or YourTripHasBegun or YourTripHasBeenCompletedSuccessfully

  {
    "result": "failed",
    "message": "Your trip has already started, you cannot cancel",
    "status": 422,
    "data": null
}

# if the order already cancelled by the user

{
    "result": "failed",
    "message": "Order Already Cancelled",
    "status": 422,
    "data": null
}

 in case of success
  // notify to user and notify to the driver if assigned
 Status :200 ok
 {
    "result": "success",
    "message": "Order Cancelled Successfully",
    "status": 200,
    "data": {
        "orders": [
            {
                "id": 5,
                "order_number": "q6TzH8jz3o",
                "from": "fuwa",
                "lat": null,
                "from_lat": 31.2962871,
                "to_lat": 31.2942976,
                "from_lng": 30.5134602,
                "to_lng": 30.4898813,
                "status": "UserCancelled",
                "created_at": "2024-03-23 12:54:20",
                "expected_salary": "44.25",
                "salary": "0.00"
            }
        ]
    }
}
