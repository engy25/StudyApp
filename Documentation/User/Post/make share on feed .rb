# User
## Post

### make share in feed

Endpoint :/make-share

Method :post

Body :

'id' => 'required and the id of id of the feed'
'content' =>'required minimum 2 max 300'

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


  if feed not found

    {
      "result": "failed",
      "message": [
          "id"
      ],
      "errors": {
          "id": [
              "The selected id is invalid."
          ]
      },
      "status": 422,
      "data": null
  }

in case of success
  Status :200 ok
  {
    "result": "success",
    "message": "Share Added Successfully",
    "status": 200,
    "data": {
        "feeds": {
            "data": [
                {
                    "id": 40,
                    "content": null,
                    "created_at": "2 days ago",
                    "user_name": "enjy",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 3,
                    "likes_count": 0,
                    "comments_count": 2,
                    "media": [],
                    "sharedAt": "1 second ago",
                    "isShared": true,
                    "shareContent": "hello",
                    "sharedLikes_count": 0,
                    "sharedComments_count": 0,
                    "share_id": 4
                },
                {
                    "id": 40,
                    "content": null,
                    "created_at": "2 days ago",
                    "user_name": "enjy",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 3,
                    "likes_count": 0,
                    "comments_count": 2,
                    "media": [],
                    "sharedAt": "2 minutes ago",
                    "isShared": true,
                    "shareContent": "hello",
                    "sharedLikes_count": 0,
                    "sharedComments_count": 0,
                    "share_id": 3
                },
                {
                    "id": 40,
                    "content": null,
                    "created_at": "2 days ago",
                    "user_name": "enjy",
                    "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                    "shares_count": 3,
                    "likes_count": 0,
                    "comments_count": 2,
                    "media": [],
                    "sharedAt": "2 minutes ago",
                    "isShared": true,
                    "shareContent": "hello",
                    "sharedLikes_count": 0,
                    "sharedComments_count": 0,
                    "share_id": 2
                },
                {
                    "id": 51,
                    "content": null,
                    "created_at": "1 hour ago",
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
                    "share_id": null
                },
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
                    "sharedAt": "4 hours ago",
                    "isShared": true,
                    "shareContent": "hello",
                    "sharedLikes_count": 0,
                    "sharedComments_count": 2,
                    "share_id": 1
                },
                {
                    "id": 50,
                    "content": null,
                    "created_at": "5 hours ago",
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
                    "share_id": null
                },
                {
                    "id": 49,
                    "content": null,
                    "created_at": "5 hours ago",
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
                    "share_id": null
                },
                {
                    "id": 48,
                    "content": null,
                    "created_at": "5 hours ago",
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
                    "share_id": null
                },
                {
                    "id": 47,
                    "content": null,
                    "created_at": "5 hours ago",
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
                    "share_id": null
                },
                {
                    "id": 46,
                    "content": null,
                    "created_at": "1 day ago",
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
                    "share_id": null
                },
                {
                    "id": 15,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 36,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 41,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 14,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 35,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 40,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 45,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
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
                    "sharedAt": null,
                    "isShared": false,
                    "shareContent": null,
                    "sharedLikes_count": 0,
                    "sharedComments_count": 0,
                    "share_id": null
                },
                {
                    "id": 33,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 38,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 43,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 11,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 13,
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
                    "share_id": null
                },
                {
                    "id": 32,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 34,
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
                    "share_id": null
                },
                {
                    "id": 37,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
                },
                {
                    "id": 39,
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
                    "share_id": null
                },
                {
                    "id": 42,
                    "content": null,
                    "created_at": "2 days ago",
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
                    "share_id": null
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
                    "share_id": null
                }
            ]
        }
    }
}
