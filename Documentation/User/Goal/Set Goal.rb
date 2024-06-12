# User
## goal

###set goal

Endpoint :/set-goal
Method :post

Body :
'hours' => 'required_with:type,daily|integer|min:1|max:20',  // in case the type is daily
'minutes' => 'required_with:type,daily|integer|min:0|max:59',   // in case the type is daily
'type' => 'required|in:general,daily',
'name'=>"required_if:type,general unique in this user"
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
          "name"
      ],
      "errors": {
          "name": [
              "The name field is required when type is general."
          ]
      },
      "status": 422,
      "data": null
  }

  or

  {
    "result": "failed",
    "message": [
        "minutes",
        "name"
    ],
    "errors": {
        "minutes": [
            "The minutes must not be greater than 59."
        ],
        "name": [
            "The name field is required when type is general."
        ]
    },
    "status": 422,
    "data": null
}




in case of success
  Status :200 ok
  {
    "result": "success",
    "message": "Password Updated Successfully",
    "status": 200,
    "data": {
        "user": {
            "user_id": 36,
            "image": "http://127.0.0.1:8000/storage/app/public/images/user/1715794513_iETPPY5O9EjS.jpeg",
            "fullname": "enjy"
        }
    }
}
