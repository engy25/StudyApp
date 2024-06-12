# User
## groups

### Show groups

Endpoint :/groups
Parameters :
"type"=>"nullable|required_with:type|in:discover,yourgroups", the type doesnot require send if doesnot send it the default is discover
"category_id"=>"nullable|exists:categories,id" if doesnot send the default is all
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

  in case failed validation

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
        "categories": [
            {
                "id": 1,
                "name": "Study",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/category/Study.png"
            },
            {
                "id": 2,
                "name": "Focus",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/category/Focus.png"
            },
            {
                "id": 3,
                "name": "SelfCare",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/category/Focus.png"
            }
        ],
        "groups": {
            "data": [
                {
                    "id": 6,
                    "name": "mozakras",
                    "code": "MfcbH6F",
                    "bio": "hellos",
                    "duration_in_hours": "2h",
                    "duration_in_minutes": "20m",
                    "weeklytimegoal_in_hours": "2h",
                    "weeklytimegoal_in_minutes": "20m",
                    "category_id": 1,
                    "feature": "Time block timer",
                    "goal_id": 4,
                    "category_name": "Study",
                    "category_icon": "http://127.0.0.1:8000/storage/app/public/images/category/Study.png",
                    "usersCount": 1,
                    "group_owner": null,
                    "live_now_count": null
                }
            ],
            "links": {
                "first": "http://127.0.0.1:8000/api/groups?page=1",
                "last": "http://127.0.0.1:8000/api/groups?page=1",
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
                        "url": "http://127.0.0.1:8000/api/groups?page=1",
                        "label": "1",
                        "active": true
                    },
                    {
                        "url": null,
                        "label": "Next &raquo;",
                        "active": false
                    }
                ],
                "path": "http://127.0.0.1:8000/api/groups",
                "per_page": 10,
                "to": 1,
                "total": 1
            }
        }
    }
}
