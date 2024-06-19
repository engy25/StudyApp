# User
## Countries

###Get Countries

Endpoint :/countries
Method :get


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


in case of success
  Status :200 ok
  {
    "result": "success",
    "message": "Data Retreived Successfully",
    "status": 200,
    "data": {
        "countries": [
            {
                "id": 1,
                "flag": "http://127.0.0.1:8000/storage/app/public/images/countryFlag/cristina-glebova-fYqQBr0EzkA-unsplash.jpg",
                "name": "United States",
                "country_code": "+20"
            },
            {
                "id": 2,
                "flag": "http://127.0.0.1:8000/storage/app/public/images/countryFlag/Lebanon.svg.png",
                "name": "Lebnon",
                "country_code": "LB"
            },
            {
                "id": 3,
                "flag": "http://127.0.0.1:8000/storage/app/public/images/countryFlag/Flag_of_Iraq.svg.png",
                "name": "Iraq",
                "country_code": "IQ"
            },
            {
                "id": 5,
                "flag": "http://127.0.0.1:8000/storage/app/public/images/countryFlag/1718119137_fcpK94SM3Hld.jpeg",
                "name": "sosone",
                "country_code": "soso"
            }
        ]
    }
}
