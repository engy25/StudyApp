# User
## Groups

###Update Group

Endpoint :/update-group/5
5 means the id of the group
Method :post

Body :
"name" => 'required|min:3|max:50|unique:groups,name'
"bio" => "required|min:5|max:300",
"feature_id" => "required|in:1,2", 1 stopwatch 2 timeblock
"weeklytimegoal_minutes" => 'required|integer|min:0|max:59',
"weeklytimegoal_hours" => 'required|integer|min:1|max:20',
"goal_id" => "required|exists:goals,id",
'hours' => 'required_if:feature_id,2|integer|min:1|max:20',
'minutes' => 'required_if:feature_id,2|integer|min:0|max:59',
"category_id" => "required|exists:categories,id"
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
    status :422 Unprocessable Content
    {
      "result": "failed",
      "message": [
          "bio",
          "hours",
          "minutes",
          "category_id"
      ],
      "errors": {
          "bio": [
              "The bio field is required."
          ],
          "hours": [
              "The hours field is required when feature id is 2."
          ],
          "minutes": [
              "The minutes field is required when feature id is 2."
          ],
          "category_id": [
              "The category id field is required."
          ]
      },
      "status": 422,
      "data": null
  }






in case of success
  Status :200 ok
  {
    "result": "success",
    "message": "Updated Successfully",
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
            "category_id": "2",
            "feature": "Time block timer",
            "goal_id": "4",
            "category_name": "Focus",
            "category_icon": "http://127.0.0.1:8000/storage/app/public/images/category/Focus.png",
            "usersCount": 1,
            "group_owner": null,
            "live_now_count": 1
        }
    }
}
