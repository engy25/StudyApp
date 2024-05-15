# User
## Order

### Track Order

Endpoint :/track-order/3
3 order_id
Method : get

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



in case the order not found


  {
    "result": "failed",
    "message": "Not Found",
    "status": 422,
    "data": null
}


 Status :200 ok
 {
  "result": "success",
  "message": "Data Retreived Successfully",
  "status": 200,
  "data": {
      "DriverLocation": {
          "lat": 26.69425,
          "lng": 30.25435,
          "status": 1
      },
      "order": {
          "id": 3,
          "order_number": "q6TzH8jz3o9",
          "from": "fuwa",
          "to": "kafrelsheikh",
          "from_lat": 31.2962871,
          "to_lat": 31.2942976,
          "from_lng": 30.5134602,
          "to_lng": 30.4898813,
          "status": "YourTripHasBegun",
          "created_at": "2024-02-26 13:12:27",
          "expected_salary": 401,
          "salary": 0
      }
  }
}
