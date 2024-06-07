# User
## Notifications
###Get AllNotification

### Get All Notification
Endpoint :/notifications
Method : Get
Body :

----------
Authorization

BarearToken :
token of user

 Response




 in case of success
 Status :200 ok
 {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "notifications": [
            {
                "id": 8,
                "title": "Your Order Cancelled Successfully",
                "data": "Your Order Cancelled Successfully",
                "user_id": 4,
                "is_read": 0,
                "read_at": null,
                "created_at": "1 minute ago",
                "updated_at": "1 minute ago"
            }
          }
        ]
    }
}

