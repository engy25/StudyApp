# User
## posts

### Show posts

Endpoint :/posts
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
                    "id": 12,
                    "content": null,
                    "created_at": "2 days ago",
                    "user_name": "enjy",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 0,
                    "likes_count": 0,
                    "comments_count": 0,
                    "media": [
                        {
                            "id": 10,
                            "type": "image",
                            "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716419245_uy9iuREfRlYQ.jpg"
                        },
                        {
                            "id": 13,
                            "type": "document",
                            "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716419245_8adrS1ykceFr.docx"
                        }
                    ],
                    "sharedAt": "3 hours ago",
                    "isShared": true,
                    "shareContent": "hello",
                    "sharedLikes_count": 0,
                    "sharedComments_count": 0,
                    "share_id": 1,
                    "favourite": false
                },

                {
                    "id": 44,
                    "content": null,
                    "created_at": "2 days ago",
                    "user_name": "admin",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 0,
                    "likes_count": 0,
                    "comments_count": 0,
                    "media": [],
                    "sharedAt": null,
                    "isShared": false,
                    "shareContent": null,
                    "sharedLikes_count": 0,
                    "sharedComments_count": 0,
                    "share_id": null,
                    "favourite": false
                }
            ]
        }
    }
}
