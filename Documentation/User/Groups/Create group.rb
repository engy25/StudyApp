# User
## Groups

###Create Group

Endpoint :/create-group
Method :post

Body :
"name"=>"required|unique:groups,name|min:3|max:50",
"bio"=>"required|min:5|max:300",
"feature_id"=>"required|in:1,2",  1 Stopwatch 2 timeblock
"weeklytimegoal_minutes"=>'required|integer|min:0|max:59',
"weeklytimegoal_hours"=>'required|integer|min:1|max:20',
"goal_id"=>"required|exists:goals,id",

'hours' => 'required_with:feature,2,|integer|min:1|max:20',  // in case the type is timeblock
'minutes' => 'required_with:feature,2|integer|min:0|max:59',   // in case the type is timeblock

"category_id"=>"required|exists:categories,id"
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
          "category_id"
      ],
      "errors": {
          "category_id": [
              "The category id field is required."
          ]
      },
      "status": 422,
      "data": null
  }

  or {
    "result": "failed",
    "message": [
        "weeklytimegoal_minutes",
        "weeklytimegoal_hours",
        "goal_id",
        "hours"
    ],
    "errors": {
        "weeklytimegoal_minutes": [
            "The weeklytimegoal minutes must not be greater than 59."
        ],
        "weeklytimegoal_hours": [
            "The weeklytimegoal hours must not be greater than 20."
        ],
        "goal_id": [
            "The selected goal id is invalid."
        ],
        "hours": [
            "The hours must be an integer."
        ]
    },
    "status": 422,
    "data": null
}






in case of success
  Status :200 ok
  {
    "result": "success",
    "message": "Added Successfully",
    "status": 200,
    "data": null
}
