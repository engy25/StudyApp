# User
## Follow

### Make follow

Endpoint :/make-follow
Method :post

Body :

'user_id' => 'the id of the user',

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


  in case of failed validation
    status :422 Unprocessable Content
    {
    "result": "failed",
    "message": [
        "user_id"
    ],
    "errors": {
        "user_id": [
            "The selected user id is invalid."
        ]
    },
    "status": 422,
    "data": null
}

in case You Follow YourSelf
  {
    "result": "failed",
    "message": "You Cannot Follow Yourself",
    "status": 404,
    "data": null
}




in case of success
  Status :200 ok
  {
    "result": "success",
    "message": "You are now following this user.",
    "status": 200,
    "data": null
}


or

{
    "result": "success",
    "message": "You are now following this user.",
    "status": 200,
    "data": null
}
