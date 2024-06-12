# User
## posts

### Show Posts Of User

Endpoint :/show-posts-of-user
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
        "feeds": [
            {
                "id": 42,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 1,
                "likes_count": 0,
                "comments_count": 0,
                "media": [],
                "sharedAt": "2 days ago",
                "isShared": true,
                "shareContent": "hello",
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": 6,
                "favourite": false
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
                "media": [],
                "sharedAt": "2 days ago",
                "isShared": true,
                "shareContent": "hello",
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": 5,
                "favourite": false
            },
            {
                "id": 40,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 3,
                "likes_count": 0,
                "comments_count": 2,
                "media": [],
                "sharedAt": "2 weeks ago",
                "isShared": true,
                "shareContent": "hello",
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": 4,
                "favourite": false
            },
            {
                "id": 40,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 3,
                "likes_count": 0,
                "comments_count": 2,
                "media": [],
                "sharedAt": "2 weeks ago",
                "isShared": true,
                "shareContent": "hello",
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": 3,
                "favourite": false
            },
            {
                "id": 40,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 3,
                "likes_count": 0,
                "comments_count": 2,
                "media": [],
                "sharedAt": "2 weeks ago",
                "isShared": true,
                "shareContent": "hello",
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": 2,
                "favourite": true
            },
            {
                "id": 51,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 0,
                "likes_count": 0,
                "comments_count": 0,
                "media": [
                    {
                        "id": 52,
                        "type": "image",
                        "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716595262_GqkmzHKH3VEE.png"
                    }
                ],
                "sharedAt": null,
                "isShared": false,
                "shareContent": null,
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": null,
                "favourite": false
            },
            {
                "id": 12,
                "content": null,
                "created_at": "2 weeks ago",
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
                "sharedAt": "2 weeks ago",
                "isShared": true,
                "shareContent": "hello",
                "sharedLikes_count": 0,
                "sharedComments_count": 4,
                "share_id": 1,
                "favourite": false
            },
            {
                "id": 50,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 0,
                "likes_count": 0,
                "comments_count": 0,
                "media": [
                    {
                        "id": 51,
                        "type": "image",
                        "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716580541_CXpZHJi4F2Lg.png"
                    }
                ],
                "sharedAt": null,
                "isShared": false,
                "shareContent": null,
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": null,
                "favourite": false
            },
            {
                "id": 49,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 48,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 47,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 46,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 15,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 36,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
                "media": [],
                "sharedAt": null,
                "isShared": false,
                "shareContent": null,
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": null,
                "favourite": true
            },
            {
                "id": 14,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 35,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 40,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 3,
                "likes_count": 0,
                "comments_count": 2,
                "media": [],
                "sharedAt": null,
                "isShared": false,
                "shareContent": null,
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": null,
                "favourite": true
            },
            {
                "id": 45,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 12,
                "content": null,
                "created_at": "2 weeks ago",
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
                "sharedAt": null,
                "isShared": false,
                "shareContent": null,
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": null,
                "favourite": false
            },
            {
                "id": 33,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 38,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 43,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 11,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "shares_count": 0,
                "likes_count": 0,
                "comments_count": 0,
                "media": [
                    {
                        "id": 9,
                        "type": "video",
                        "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716419184_Ck9AwoJp1c26.mp4"
                    }
                ],
                "sharedAt": null,
                "isShared": false,
                "shareContent": null,
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": null,
                "favourite": false
            },
            {
                "id": 32,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
            },
            {
                "id": 37,
                "content": null,
                "created_at": "2 weeks ago",
                "user_name": "enjy",
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
                "media": [],
                "sharedAt": null,
                "isShared": false,
                "shareContent": null,
                "sharedLikes_count": 0,
                "sharedComments_count": 0,
                "share_id": null,
                "favourite": true
            }
        ]
    }
}
