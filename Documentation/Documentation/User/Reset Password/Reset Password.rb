# User
## Reset Password

### Reset Password

Endpoint :/reset-password
Method : post
Body :
'email'=>'required|exists:users,email',
'otp'=>'required|exists:users,otp',
----------
Authorization

BarearToken :


 Response

in case validation error

  422Unprocessable Content
  {
    "result": "failed",
    "message": [
        "email",
        "otp"
    ],
    "errors": {
        "email": [
            "The selected email is invalid."
        ],
        "otp": [
            "The selected otp is invalid."
        ]
    },
    "status": 422,
    "data": null
}


 in case of success
 Status :200 ok
 {
  "result": "success",
  "message": "Password Changed Successfully.",
  "status": 200,
  "data": null
}








