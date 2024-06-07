# User
## Authetication

### login by phone

Endpoint :/user-login
Method : post
Body :

'email'=>'required',
'password'=>'required',
'device_token' => 'required',
'type' => 'required|in:ios,android',

----------
Authorization

BarearToken :


 Response

in case email or password not err
  {
    "result": "failed",
    "message": "These credentials do not match our registered data.",
    "status": 422,
    "data": null
}

in case of user not active the user doesnot make confirmation code and in this case go to confirm code


  {
    "result": "failed",
    "message": "This account is not activated Pleaze Complete Your Register.",
    "status": 403,
    "last_step": "verify",
    "data": {
        "user": {
            "otp": 1111,
            "email": "engymohammed1599@gmail.com"
        }
    }
}


 in case of success
 Status :200 ok
 {
  "result": "success",
  "message": "User LOgged Successfully. ",
  "status": 200,
  "data": {
      "user": {
          "id": 36,
          "fullname": "enjy",
          "dob": null,
          "is_active": true,
          "image": "http://127.0.0.1:8000/storage/app/public/images/user/1715794513_iETPPY5O9EjS.jpeg",
          "email": "engymohammed156@gmail.com",
          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNmZhZmE1MDg1ZGMxMDFlY2Q1MDQ0ZjRlZDJhOTIzZTRlNDYzNjc0YWRjN2IyNzI4YjViNTRhYjc3NmQxZWFiYWIwYTYwZjU3ZGI1NWFjNGUiLCJpYXQiOjE3MTU3OTUwOTIuNTM5MzI3LCJuYmYiOjE3MTU3OTUwOTIuNTM5MzMxLCJleHAiOjE3NDczMzEwOTIuNTMwNjgyLCJzdWIiOiIzNiIsInNjb3BlcyI6W119.COhOuHm7yhNPJVhLWV0NLLL5ZO0gPweubsU3shWAs7VKUoXk4htcgOkLDWs0pESXCz5Q0wO4Yk3pSFoQvwO0iqoN7UctY-zwZasMXO7nCutiFSduqZWWrVy3wgVbC4mCkSLRqbgnGbXDPsv4yMtW1IXl0jIiX1jzcaiCSUiG87ci2ZqRortW5qJ-g5lQMu5-n4PH-9Bh-gwcKpayErA9D56iatjfjVxvIp7H_kTQDETJ6TAWVgryYcUgw7zfQRtNlS_1LL_vav3l1baY9TW_y_kA19wtMTInc4BZdsYIRJFlEmd5GiGQX_NIltUtC93AANhz18y87M-o22hrioojAg"
      }
  }
}



