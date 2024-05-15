# User
## Authetication

### resend otp again

Endpoint :/resend-otp
Method : post
Body :
'email'=>'required|from email register',
Authorization

BarearToken :


 Response


in case of email not exits
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
          "otp": 1234
      }
  }
}
