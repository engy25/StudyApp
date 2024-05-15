# User
## Authetication

### confirm email via code

Endpoint :/confirm-code
Method : post
Body :

'email' => 'required|email|exists:users,email',
'otp' => 'required|exists:users,otp',
'device_token' => 'required',
'type' => 'required|in:ios,android',
----------
Authorization

BarearToken :


 Response

in case otp is error
  {
    "result": "failed",
    "message": [
        "otp"
    ],
    "errors": {
        "otp": [
            "The selected otp is invalid."
        ]
    },
    "status": 422,
    "data": null
}

in case of phone not exits
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
    "message": "User Verified Successfully. ",
    "status": 200,
    "data": {
        "user": {
            "id": 39,
            "fullname": "engy",
            "dob": null,
            "is_active": true,
            "image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
            "flag": "http://127.0.0.1:8000/storage/app/public/images/countryFlag/cristina-glebova-fYqQBr0EzkA-unsplash.jpg",
            "email": "engy@gmail.com",
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYmM1YjU3OGEyYWY2MTI1Nzk3YjJkYzU4M2FiMGUyYjI4YzRlZDM2MzMwOWIwNTE5MTc5ZDNjMDRlZDU3YjY2ZmQ4N2Q4ZTFkNGZiZTAzMGYiLCJpYXQiOjE3MTEyMDk1ODguNjE4OTg3LCJuYmYiOjE3MTEyMDk1ODguNjE4OTg5LCJleHAiOjE3NDI3NDU1ODguNjEyNzgsInN1YiI6IjM5Iiwic2NvcGVzIjpbXX0.fpsg4bhbuQIdLkZIb5ip1W4aDwutK1X7sPk8QmmGk5H6ouy6B9_3ob2shrRVjOzco2NrHGb8CBmUchSoFi_sElfTHPsWkYVtxZDUtNWjLFPCP0yqpEMIRsGnn5SmbwW7-SGnypWa_k1wB8rxCTWXKsVWWQYpA_ZGjPO8iINorRgWrCj63yzIF22iIIr4BxY23n-6qv5x-mu8hpFAM5Q9JCiUhfHoFybL-4-10v6wqczz8bBHJU6cLHqr_ZR63tRKgnQiGEFLqB1nWh6lftZGt0i33PsL9s0WxbE4RqLgPqIZJ-3FXvP3Corz_sQ1bH7DfGYivQrHZiUSCh_UG6oupA"
        }
    }
}



