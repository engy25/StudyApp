# User
## Authetication

/////// Login By Social

Endpoint :/user-login-social
Method : post
Body :

'provider' => 'required|in:facebook,google,apple',
'provider_id' => 'required|string|between:2,255',
'type' => 'required|in:ios,android',
'device_token' => 'required',
----------
Authorization


BarearToken :
token of the user

 Response

in case  provider_id not found in this case got to register and make normal register but add provider and provider_id
  {
    "result": "failed",
    "message": "User Not Registered In The System ",
    "status": 422,
    "data": null
}

in case provider_id  found but this account not active(not make confirm code)
{
    "result": "failed",
    "message": "This account is not activated Pleaze Complete Your Register.",
    "status": 403,
    "last_step": "verify",
    "data": {
        "user": {
            "otp": 1111,
            "email": "engymohammed1559@gmail.com"
        }
    }
}

 in case of success
 Status :200 ok
 {
    "result": "success",
    "message": "User Verified Successfully. ",
    "status": 200,
    "data": {
        "user": {
            "id": 40,
            "fullname": "enjy",
            "dob": null,
            "is_active": true,
            "image": "http://127.0.0.1:8000/storage/app/public/images/user/1715796363_JQ4fVIxM8MrQ.jpeg",
            "email": "engymohammed1559@gmail.com",
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiY2Q5YTlmZGI3NmJkMWU5ZTAyNWQzNmJlNDk4NDdlMmZhYTFkYjcyY2ZmNGQyNmUxYWYwMWI2ZDg0ZDllNWVlYjZlODJhMDU5NmQ0MDEwMzMiLCJpYXQiOjE3MTU3OTY0ODUuMDE0NjQ4LCJuYmYiOjE3MTU3OTY0ODUuMDE0NjUsImV4cCI6MTc0NzMzMjQ4NS4wMDQxOTQsInN1YiI6IjQwIiwic2NvcGVzIjpbXX0.oajLZ8HzMhLnuj4TPyXY8cFmjKgDbIBcIwPMNCEH186HDlWAPh9IcjSMd2O_4Ue-RbePKJKGZmvkXh6c90T0kRiKlrSYCAef281ry8CzZRwLbxvec7W0pdajABEHTOA9k7iiqg4VYkGfKWFMc4_WD7hwaZt-ee2gigDSQc-me7E8DB6PbYaglml_MUqyaocvpC-2XAzPlqm2zG-5J_4g7FmT71KlJebtNhY5FN2sJ17M5-xXFnvBphdLAmns44OJsFXYdjRDEG95JYaStnhrw4naONbJVPiUuMlqHzKgI7_6nShT8A_SGOXs-XBEVJ0HEh1E-Zgs46lknt_LlXv8dA"
        }
    }
}
