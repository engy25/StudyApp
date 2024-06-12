# User
## Post

###show feed or share

Endpoint :/show-feed

Method :get

Params :
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
              "The selected id is invalid for the feed type."
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



in case of success feed
  Status :200 ok
  {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "Feed": {
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
            "favourite": false
        }
    }
}



in case of success share
  Status :200 ok

  {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "Share": {
            "share_id": 5,
            "shareContent": "hello",
            "sharedAt": "54 minutes ago",
            "shared_user_name": "enjy",
            "shared_user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
            "sharedLikes_count": 0,
            "sharedComments_count": 0,
            "feed_id": 41,
            "feed_content": null,
            "feed_created_at": "2 weeks ago",
            "feed_user_name": null,
            "feed_user_image": null,
            "feed_shares_count": 1,
            "feed_likes_count": 0,
            "feed_comments_count": 0,
            "feed_media": [],
            "favourite": false
        }
    }
}
