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
            "id": 11,
            "content": "5555555555555555555555ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooojjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj engy muhammed saed metwwaly ",
            "created_at": "3 weeks ago",
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
            "favourite": false
        },
        "comments": [
            {
                "id": 5,
                "user_name": "enjy",
                "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "comment": "hello",
                "created_at": "2024-06-10 23:05:31",
                "replies": [
                    {
                        "id": 6,
                        "user_name": "enjy",
                        "user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                        "comment": "hello",
                        "created_at": "2024-06-10 23:05:58",
                        "replies": []
                    }
                ]
            }
        ]
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
            "share_id": 1,
            "shareContent": "hello",
            "sharedAt": "3 weeks ago",
            "shared_user_name": "enjy",
            "shared_user_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
            "sharedLikes_count": 0,
            "sharedComments_count": 4,
            "feed_id": 12,
            "feed_content": "jj",
            "feed_created_at": "3 weeks ago",
            "feed_user_name": null,
            "feed_user_image": null,
            "feed_shares_count": 0,
            "feed_likes_count": 0,
            "feed_comments_count": 0,
            "feed_media": [
                {
                    "id": 10,
                    "type": "image",
                    "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716419245_uy9iuREfRlYQ.jpg"
                },
                {
                    "id": 13,
                    "type": "document",
                    "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716419245_8adrS1ykceFr.docx"
                },
                {
                    "id": 53,
                    "type": "video",
                    "media": "http://127.0.0.1:8000/storage/app/public/images/media/a.mp4"
                },
                {
                    "id": 54,
                    "type": "image",
                    "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716419245_uy9iuREfRlYQ.jpg"
                },
                {
                    "id": 55,
                    "type": "image",
                    "media": "http://127.0.0.1:8000/storage/app/public/images/media/1716419245_uy9iuREfRlYQ.jpg"
                }
            ],
            "favourite": false
        },
        "comments": []
    }
}
