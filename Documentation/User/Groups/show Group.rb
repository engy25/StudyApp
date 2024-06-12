# User
## groups

### Show group

Endpoint :/show-group/6
6 is the group_id
Parameters :
--
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

  in casegroup_id not found
    {
      "result": "failed",
      "message": "Not Found",
      "status": 404,
      "data": null
  }


 in case of success
 Status :200 ok
 {
  "result": "success",
  "message": "Data Retreived Successfully",
  "status": 200,
  "data": {
      "groups": {
          "id": 6,
          "name": "mozakras",
          "code": "MfcbH6F",
          "bio": "hellos",
          "duration_in_hours": "2h",
          "duration_in_minutes": "20m",
          "weeklytimegoal_in_hours": "2h",
          "weeklytimegoal_in_minutes": "20m",
          "category_id": 2,
          "feature": "Time block timer",
          "goal_id": 4,
          "category_name": "Focus",
          "category_icon": "http://127.0.0.1:8000/storage/app/public/images/category/Focus.png",
          "usersCount": 1,
          "group_owner": null,
          "live_now_count": 1
      }
  }
}
