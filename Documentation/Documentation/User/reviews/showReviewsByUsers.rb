# User
## Reviews

### Show Reviews of THe driver

Endpoint :/review?driver_id=18
Method : Get
Body :

----------
Headers
driver_id
Authorization

BarearToken :
token of user

 Response


 Response



in case of driver_id not found

 {
    "result": "failed",
    "message": "Not Found",
    "status": 404,
    "data": null
}

 in case of success
 Status :200 ok
 {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "data": {
            "reviews": {
                "data": [
                    {
                        "user_id": 19,
                        "user_name": "Enjy",
                        "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                        "driver_id": 18,
                        "driver_name": "salahss",
                        "driver_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                        "order_id": 2,
                        "rating": 4,
                        'title'=>null,
                        "comment": "engy",
                        "created_at": "Mar 19, 2024"
                    },
                    {
                        "user_id": 18,
                        "user_name": "salahss",
                        "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                        "driver_id": 18,
                        "driver_name": "salahss",
                        "driver_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                        "order_id": 2,
                        "rating": 4,
                        'title'=>null,
                        "comment": "engy",
                        "created_at": "Mar 19, 2024"
                    }
                ],
                "links": {
                    "first": "http://127.0.0.1:8000/api/review?page=1",
                    "last": "http://127.0.0.1:8000/api/review?page=1",
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
                            "url": "http://127.0.0.1:8000/api/review?page=1",
                            "label": "1",
                            "active": true
                        },
                        {
                            "url": null,
                            "label": "Next &raquo;",
                            "active": false
                        }
                    ],
                    "path": "http://127.0.0.1:8000/api/review",
                    "per_page": 10,
                    "to": 2,
                    "total": 2
                }
            },
            "reviews_count": 2,
            "rate_avg": 4,
            "trips_count": 0
        }
    }
}


