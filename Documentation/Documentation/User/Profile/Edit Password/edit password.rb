# User
## Profile

###Edit Password

Endpoint :/edit-password
Parameters :
old_password => your password,required|minimum 6
password => the new password required|minimum 6  , must consist of a combination of uppercase and lowercase letters, numbers and special symbols and at least 6 letters
confirm_password: the password must match the password
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
      "message": null,
      "errors": {
          "old_password": [
              "Old Password Is Not Correct"
          ],
          "password": [
              "The Password must consist of a combination of uppercase and lowercase letters, numbers and special symbols and at least 6 letters"
          ],
          "confirm_password": [
              "The confirm password and password must match."
          ]
      },
      "status": 422,
      "data": null
  }


in case of old password not Correct
  {
    "result": "failed",
    "message": null,
    "errors": {
        "old_password": [
            "Old Password Is Not Correct"
        ]
    },
    "status": 422,
    "data": null
  }



in case of success
  Status :200 ok
  {
    "result": "success",
    "message": "Password Updated Successfully",
    "status": 200,
    "data": {
        "user": {
            "user_id": 36,
            "image": "http://127.0.0.1:8000/storage/app/public/images/user/1715794513_iETPPY5O9EjS.jpeg",
            "fullname": "enjy"
        }
    }
}
