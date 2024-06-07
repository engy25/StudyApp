# User
## Notifications
###Count Notification

### Count of Notification
Endpoint :/count-notifications
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
      "is_read": 1,
      "not_read": 0
  }
}

