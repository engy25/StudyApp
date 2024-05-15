# User
## Home


### Display Services and categories
Endpoint :/services
Method : Get
Body :

----------
Authorization

BarearToken :
token of user

 Response




 in case of success
 Status :200 ok
 {

 "result": "success",
 "message": "Data Retreived Successfully",
 "status": 200,
 "data": {
     "services": [
         {
             "id": 1,
             "name": "توصيله",
             "image": "http://127.0.0.1:8000/storage/app/public/images/service/1710890026_z3iDsQI50CLp.png",
             "categories": [
                 {
                     "id": 1,
                     "name": "اقتصادي",
                     "image": "http://127.0.0.1:8000/storage/app/public/images/category/1710894504_JHROkigiWE0j.png"
                 },
                 {
                     "id": 2,
                     "name": "بلس",
                     "image": "http://127.0.0.1:8000/storage/app/public/images/category/1710894529_h9E6ScZFWQ30.png"
                 },
                 {
                     "id": 3,
                     "name": "بريميوم",
                     "image": "http://127.0.0.1:8000/storage/app/public/images/category/premium.png"
                 }
             ]
         },
         {
             "id": 2,
             "name": "سفر",
             "image": "http://127.0.0.1:8000/storage/app/public/images/service/1710888187_0AMqOkmdvDQf.jpg",
             "categories": []
         },
         {
             "id": 3,
             "name": "شحنه",
             "image": "http://127.0.0.1:8000/storage/app/public/images/service/shohna.png",
             "categories": []
         }
     ]
 }
}
