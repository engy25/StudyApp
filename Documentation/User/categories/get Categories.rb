# User
## categories

###Get Categories

Endpoint :/categories
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
        "categories": [
            {
                "id": 1,
                "name": "Study",
                "description": "Study Hard",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/category/Study.png"
            },
            {
                "id": 3,
                "name": "SelfCare",
                "description": "Focus",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/category/Focus.png"
            }
        ]
    }
}
