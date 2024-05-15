# User
## Order

### Make Order

Endpoint :/make-order
Method : Post
Body :
'service_id'=>"required|exists:services,id",
'category_id'=>"required|exists:categories,id",
'from'=>"required|max:200",
'to'=>"required|max:200",
'from_lat'=>"required|numeric",
'to_lat'=>"required|numeric",
'from_lng'=>"required|numeric",
'to_lng'=>"required|numeric",
'notes' => 'nullable|min:3|max:500',
'payment_type' => 'required|in:cash,visa',
'transaction_id' => 'required_if:payment_type,visa',
if the category ==2
 when= 'required|date_format:Y-m-d H:i:s|after:now';
"num_of_passengers"="required|integer|min:1";
if the category ==3

  "when"= 'required|date_format:Y-m-d H:i:s|after:now';
 "description_of_shipment"="required|min:5|max:500";
----------
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

  in case of service and categories is not form the endpoint from services

    {
    "result": "failed",
    "message": "Pricing has not been set for this category and service, Pleaze Choose another service and category",
    "status": 404,
    "data": null
}

in case of validation errors

{
    "result": "failed",
    "message": [
        "to"
    ],
    "errors": {
        "to": [
            "The to field is required."
        ]
    },
    "status": 422,
    "data": null
}

 in case of success
  {
    "result": "success",
    "message": "Order Added Successfully",
    "status": 200,
    "data": {
        "order_id": 38
    }
}
