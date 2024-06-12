# User
## posts

### Show The Users That make like

Endpoint :/show-user-make-like

Parameters :

'type' => 'required| share or feed',
'id' => required and the id of the share or the id of the feed

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

 in case of validation

  'type' => 'required| share or feed',
  'id' => required and the id of the share or the id of the feed


 in case of success
 Status :200 ok
 {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "users": [
            {
                "id": 1,
                "fullname": "admin",
                "image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y"
            },
            {
                "id": 2,
                "fullname": "enjy",
                "image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y"
            }
        ]
    }
}
