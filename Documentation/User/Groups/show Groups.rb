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




 in case of success in case type yourgroups
 Status :200 ok
 {
  "result": "success",
  "message": "Data Retreived Successfully",
  "status": 200,
  "data": {
      "categories": [],
      "groups": [
          {
              "id": 9,
              "name": "mozakra",
              "code": "8KCu0JC",
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
              "group_owner": "enjy",
              "group_owner_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
              "live_now_count": 0,
              "is_private": 1
          },
          {
              "id": 10,
              "name": "mozakra9",
              "code": "8wHf7IW",
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
              "group_owner": "admin",
              "group_owner_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
              "live_now_count": 0,
              "is_private": 0
          },
          {
              "id": 11,
              "name": "mozakra99",
              "code": "TNPaJ4B",
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
              "group_owner": "admin",
              "group_owner_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
              "live_now_count": 0,
              "is_private": 0
          },
          {
              "id": 12,
              "name": "mo999",
              "code": "MtLWLX6",
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
              "group_owner": "admin",
              "group_owner_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
              "live_now_count": 0,
              "is_private": 0
          }
      ],
      "groups_your_own": [
          {
              "id": 8,
              "name": "mozakras",
              "code": "XT5dmCU",
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
              "group_owner": "enjy",
              "group_owner_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
              "live_now_count": 0,
              "is_private": 1
          },
          {
              "id": 9,
              "name": "mozakra",
              "code": "8KCu0JC",
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
              "group_owner": "enjy",
              "group_owner_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
              "live_now_count": 0,
              "is_private": 1
          }
      ]
  }
}


in case of success in case type discover
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
                "description": "Study Hard",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/category/Study.png"
            },
            {
                "id": 3,
                "name": "SelfCare",
                "description": "Focus",
                "icon": "http://127.0.0.1:8000/storage/app/public/images/category/Focus.png"
            }
        ],
        "groups": [
            {
                "id": 8,
                "name": "mozakras",
                "code": "XT5dmCU",
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
                "group_owner": "enjy",
                "group_owner_image": "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y",
                "live_now_count": 0,
                "is_private": 1
            }
        ],
        "groups_your_own": []
    }
}
