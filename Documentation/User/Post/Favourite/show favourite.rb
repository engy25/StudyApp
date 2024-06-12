# User
## posts

### show favourite

Endpoint :/show-favoutrite/feed
feed if you want get the feed favoutrites
share if you want get the share favourites
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
        "feeds": {
            "data": [
                {
                    "id": 40,
                    "content": null,
                    "created_at": "2 weeks ago",
                    "user_name": "enjy",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 3,
                    "likes_count": 0,
                    "comments_count": 2,
                    "media": []
                },
                {
                    "id": 41,
                    "content": null,
                    "created_at": "2 weeks ago",
                    "user_name": "enjy",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 1,
                    "likes_count": 0,
                    "comments_count": 0,
                    "media": []
                },
                {
                    "id": 42,
                    "content": null,
                    "created_at": "2 weeks ago",
                    "user_name": "enjy",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 1,
                    "likes_count": 0,
                    "comments_count": 0,
                    "media": []
                }
            ]
        }
    }
}
