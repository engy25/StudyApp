# User
## Profile

### Show Profile  2: Show Profile

Endpoint :/show-profile
Parameters :
----------
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



 in case of success
 Status :200 ok
 {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "user": {
            "id": 2,
            "fullname": "enjy",
            "dob": null,
            "is_active": true,
            "image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
            "email": "engy@gmail.com",
            "following_counts": 1,
            "follower_counts": 0,
            "posts_counts": 21,
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiNjk3MTMyM2IzODZkMTUwZDgxOWQ4Y2RlY2RmY2I4NWM2OWM2ODEyMDY3YmNmYmMyODYxMGNlYzZjNDU1ZjAwMzVlZWFjZmI0ODM1Yjc1NDEiLCJpYXQiOjE3MTgwNjUxMzQuODk1MzIyLCJuYmYiOjE3MTgwNjUxMzQuODk1MzI1LCJleHAiOjE3NDk2MDExMzQuODg4NTQ4LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.dvYmicsjGZLMQSqjWE4jll8oS2DipaWEIDLrFd07XS2PpLJsEUJXodNkNeheYPJ1n1aJFiZ1X_ShjAFhfp2ZfA"
        }
    }
}


