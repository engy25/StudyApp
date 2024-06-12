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
                    "share_id": 4,
                    "favourite": false
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
                    "share_id": 3,
                    "favourite": false
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
                    "share_id": 2,
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
