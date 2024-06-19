# User
## studies

###Get studies

Endpoint :/studies
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
        "studies": [
            {
                "id": 10,
                "name": "study45",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/studyIcon/1718112355_YiVlUkABGs67.jpeg",
                "branches": [
                    {
                        "id": 4,
                        "name": "branch1"
                    }
                ]
            },
            {
                "id": 12,
                "name": "Science",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/studyIcon/1718112212_6kpglhXt4PyS.jpg",
                "branches": [
                    {
                        "id": 6,
                        "name": "branch2"
                    }
                ]
            }
        ]
    }
}
