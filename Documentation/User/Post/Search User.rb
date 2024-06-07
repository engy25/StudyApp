# User
## posts

### Search User

Endpoint :/search-user/engy
engy is the keyword that i search for
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
        "users": {
            "data": [
                {
                    "id": 2,
                    "fullname": "enjy",
                    "image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y"
                }
            ],
            "links": {
                "first": "http://127.0.0.1:8000/api/search-user/engy@gmail.com?page=1",
                "last": "http://127.0.0.1:8000/api/search-user/engy@gmail.com?page=1",
                "prev": null,
                "next": null
            },
            "meta": {
                "current_page": 1,
                "from": 1,
                "last_page": 1,
                "links": [
                    {
                        "url": null,
                        "label": "&laquo; Previous",
                        "active": false
                    },
                    {
                        "url": "http://127.0.0.1:8000/api/search-user/engy@gmail.com?page=1",
                        "label": "1",
                        "active": true
                    },
                    {
                        "url": null,
                        "label": "Next &raquo;",
                        "active": false
                    }
                ],
                "path": "http://127.0.0.1:8000/api/search-user/engy@gmail.com",
                "per_page": 10,
                "to": 1,
                "total": 1
            }
        }
    }
}
