# User
## Sessions

###Start Working

Endpoint :/focus-sessions/start
Method :post

Body :
"feature_id"=>"required|exists:features,id", 1--> stop watch or 2 time block timer
"goal_id"=>"required|exists:goals,id",
"is_pomodoro"=>"nullable|in:1,0",
"pomodoro_mode" => "nullable|in:beginer,standard,advanced'|required_with:is_pomodoro,1",
'duration_hours' => 'required_with:feature,2,|integer|min:1|max:20',
'duration_minutes' => 'required_with:feature,2|integer|min:0|max:59',

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
          "pomodoro_mode"
      ],
      "errors": {
          "pomodoro_mode": [
              "The pomodoro mode field is required when is pomodoro / 1 is present."
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
