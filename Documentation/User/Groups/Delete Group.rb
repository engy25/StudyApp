# User
## groups

### Delete groups

Endpoint :/delete-group/8
8 is the group id
Parameters :
--------------
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

  in case group not found
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
  "message": "Group Deleted Successfully",
  "status": 200,
  "data": null
}
