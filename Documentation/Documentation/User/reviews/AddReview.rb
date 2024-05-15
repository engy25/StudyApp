# User
## reviews

### Add Review

Endpoint :/add-review
Method : Post
Body :
'order_id' => 'required|id of the order,
'rating' => 'required|numeric|between:1,5',
'title' =>'nullable|string|max:200'
'comment' => 'nullable|string|max:255

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

  in case of drive not assigned


    {
    "result": "failed",
    "message": "Driver Still Not Assigned To This Order",
    "status": 404,
    "data": null
}

the status must  YourTripHasBeenCompletedSuccessfully or DriverCancelled  or OrderExpired if the status pending ot otherwise\
{
    "result": "failed",
    "message": "You Can not rate you must complete your trip",
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
            "userReviews": {
                "data": [
                    {
                        "user_id": 33,
                        "user_name": "asdf",
                        "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                        "driver_id": 21,
                        "driver_name": "asdf",
                        "driver_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                        "order_id": 3,
                        "rating": 4,
                        'title'=>null,
                        "comment": "engy",
                        "created_at": "Mar 23, 2024"
                    }
                ],
                "links": {
                    "first": "http://127.0.0.1:8000/api/add-review?page=1",
                    "last": "http://127.0.0.1:8000/api/add-review?page=1",
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
                            "url": "http://127.0.0.1:8000/api/add-review?page=1",
                            "label": "1",
                            "active": true
                        },
                        {
                            "url": null,
                            "label": "Next &raquo;",
                            "active": false
                        }
                    ],
                    "path": "http://127.0.0.1:8000/api/add-review",
                    "per_page": 15,
                    "to": 1,
                    "total": 1
                }
            },
            "reviews_count": 1,
            "rate_avg": 4
        }
    }
}
