# User
## Reset Password

### Send Code To Phone

Endpoint :/send-code
Method : post
Body :
'email' => 'required|exists:users,email',
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
            "The selected email is invalid."
        ]
    },
    "status": 422,
    "data": null
}

 in case of success
 Status :200 ok
 {
  "result": "success",
  "message": "Message Sent Successfully",
  "status": 200,
  "data": {
      "user": {
          "email": "engymohammed156@gmail.com",
          "otp": 1111
      }
  }
}








