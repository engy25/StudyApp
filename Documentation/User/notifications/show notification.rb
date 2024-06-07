# User
## Notifications

### Show Notification

Endpoint :/showNotifications/idofthenotification for ex:1
Method : get
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

  in case of id is incorrect or this user doesnot have this notification

    {
      "result": "failed",
      "message": "Not Found",
      "status": 404,
      "data": null
  }


 in case of success

 Status :200 ok
 {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "notifications": {
            "id": 8,
            "title": "Your Order Cancelled Successfully",
            "data": "Your Order Cancelled Successfully",
            "user_id": 4,
            "is_read": "1",
            "read_at": "2024-03-23T15:39:21.584045Z",
            "created_at": "36 minutes ago",
            "updated_at": "1 second ago"
        }
    }
}
