```
GET /courses?user=lehrer

{
  "courses" : [
      {
        "id" : "",
        "name" : "",
      },
      {
        "id" : "",
        "name" : "",
      },
      ....
  ]
}



GET /students?course=id&user=lehrer

{
  "students": [
    {
      "id": "",
      "firstNane": "",
      "givenName": "",
      "photoUrl": "",
      "lastPraise": "YYYY-MM-DD HH:MM"
      "praiseCount": 123
    },
    ....
  ]
}



POST /praise

{
  "teacherId": 123,
  "studentId": 456
}



GET /translations?search=

{
  "translations": [
    { 
      "id": 123,
      "text": ""
      "score": 0.9
    },
    ....
  ]
}
```