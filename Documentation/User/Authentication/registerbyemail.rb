# User
## Authetication

### Register by email

Endpoint :/user-register
Method : post
Body :

      'fullname' => 'required|string|between:3,40',
      'terms' => 'required|in:1',
      'password' => 'required|The Password must consist of a combination of uppercase and lowercase letters, numbers and special symbols and at least 6 letters',
      'confirm_password' => 'required|same:password',
      'email'=>'required|email|max:55|unique'




----------
Authorization

BarearToken :


 Response

in case validation error

  422Unprocessable Content
  {
    "result": "failed",
    "message": [
        "email"
    ],
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    },
    "status": 422,
    "data": null
}


 in case of success
 Status :200 ok
 {
    "result": "success",
    "message": "The process was completed successfully, please complete the rest of the registration stages.",
    "status": 200,
    "data": {
        "user": {
            "id": 37,
            "otp": 1111,
            "email": "engy@gmail.com",
        }
    }
}




// then go to confirmation



