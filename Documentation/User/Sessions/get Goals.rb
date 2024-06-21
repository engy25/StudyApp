# User
## Goals

###Get Goals

Endpoint :/goals
Method :get


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
        "goals": [
            {
                "id": 2,
                "name": "task2"
            },
            {
                "id": 3,
                "name": "task3"
            }
        ]
    }
}
