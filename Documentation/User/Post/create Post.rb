# User
## Post

###Create Post

Endpoint :/create-post
Method :post

Body :
'images.*' => 'nullable|image|mimes:jpeg,bmp,png|max:2048',
'text' => 'nullable|string|max:5000|required_without_all:images.*,video,document',
'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm',
'document' => 'nullable|file|mimes:docx,doc,txt,wpd,pages,pdf|max:5120',
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


  in case of failed validation
    status :4 22Unprocessable Content
    {
      "result": "failed",
      "message": [
          "text"
      ],
      "errors": {
          "text": [
              "The text field is required when none of images.* / video / document are present."
          ]
      },
      "status": 422,
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
                "id": 51,
                "content": null,
                "created_at": "1 second ago",
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
                "sharedAt": "3 hours ago",
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
                "share_id": null,
                "favourite": false
            }
        ]
    }
}
