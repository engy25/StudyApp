# User
## Post
###likes

###make like in feed

Endpoint :/make-like

Method :post

Body :
'type' => 'required| share or feed',
'id' => required and the id of the share or the id of the feed

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


  if feed or share not found
    {
      "result": "failed",
      "message": [
          "id"
      ],
      "errors": {
          "id": [
              "The selected id is invalid for the share type."
          ]
      },
      "status": 422,
      "data": null
  }

  if the type not exist
    {
      "result": "failed",
      "message": [
          "type"
      ],
      "errors": {
          "type": [
              "The selected type is invalid."
          ]
      },
      "status": 422,
      "data": null
  }




in case of success to Delete like
  Status :200 ok
  {
    "result": "success",
    "message": "Like Deleted Successfully",
    "status": 200,
    "data": {
        "feeds": {
            "data": [
                {
                    "id": 51,
                    "content": null,
                    "created_at": "41 minutes ago",
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
                    "sharedComments_count": 0,
                    "share_id": 1,
                    "favourite": false
                },
                {
                    "id": 50,
                    "content": null,
                    "created_at": "4 hours ago",
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
                    "created_at": "4 hours ago",
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
                    "share_id": null,
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
