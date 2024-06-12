# User
## posts

### Show Comments of the feed and shares

Endpoint :/show-comments

Parameters :

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

 in case of validation

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


 in case of success
 Status :200 ok
 {
  "result": "success",
  "message": "Data Retreived Successfully",
  "status": 200,
  "data": {
      "users": {
          "data": [
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
          ],
          "links": {
              "first": "http://127.0.0.1:8000/api/show-comments?page=1",
              "last": "http://127.0.0.1:8000/api/show-comments?page=1",
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
                      "url": "http://127.0.0.1:8000/api/show-comments?page=1",
                      "label": "1",
                      "active": true
                  },
                  {
                      "url": null,
                      "label": "Next &raquo;",
                      "active": false
                  }
              ],
              "path": "http://127.0.0.1:8000/api/show-comments",
              "per_page": 10,
              "to": 1,
              "total": 1
          }
      }
  }
}
