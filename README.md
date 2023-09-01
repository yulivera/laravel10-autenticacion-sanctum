<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# AUTH SANCTUM API REST

Autenticacion santum API REST

## API Reference

#### Post Register User

```http
  POST api/auth/register
```

| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. Your name user |
| `email` | `string` | **Required**. Your email user |
| `password` | `string` | **Required**. Your password user |

#### Response

```
{
    "status": true,
    "message": "User created successfully",
    "token": "1|laravel_sanctum_IGSsopSDsyTnE4qkF2AIcxnoRPM0DdticYf6sTIHc7cc57f3"
}
```

#### Post Login

```http
  POST /api/auth/login
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. Email |
| `password`      | `string` | **Required**. password |

#### Response

Token JWT.

```
{
    "status": true,
    "message": "User logged in successfully",
    "data": {
        "id": 1,
        "name": "Lupe Rurwer",
        "email": "lupe_rur@live.com",
        "email_verified_at": null,
        "created_at": "2023-09-01T00:10:03.000000Z",
        "updated_at": "2023-09-01T00:10:03.000000Z"
    },
    "token": "2|laravel_sanctum_Un42vCvLJGauu61dySKnp8SPKPGkzaUv3wN5Kmu8fad7fc99"
}
``` 
#### Get logout

```http
  GET /api/auth/logout
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Bearer Token`      | `token` | **Required** Header|

#### Response logout

```
{
    "status": true,
    "message": "User logged out successfully"
}
```

#### Get Departments

```http
  GET api/departments
```
#### Response
```
[
    {
        "id": 1,
        "name": "Biological Science Teacher",
        "created_at": "2023-08-31T18:35:22.000000Z",
        "updated_at": "2023-08-31T18:35:22.000000Z"
    },
    {
        "id": 2,
        "name": "MARCOM Manager",
        "created_at": "2023-08-31T18:35:22.000000Z",
        "updated_at": "2023-08-31T18:35:22.000000Z"
    },
]
```

#### GET departament by id

```http
  GET api/departments/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** id department|

#### Response

```
{
    "status": true,
    "data": {
        "id": 1,
        "name": "Biological Science Teacher",
        "created_at": "2023-08-31T18:35:22.000000Z",
        "updated_at": "2023-08-31T18:35:22.000000Z"
    }
}
```
#### POST departments register

```http
  POST api/departments
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required** name department|

#### Response

```
{
    "status": true,
    "message": "Department creadted successfully"
}
```

#### UPDATE department

```http
  PUT api/departments/{id}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** id department, parameter|
| `name`      | `string` | **Required** name department|

#### Response
```
{
    "status": true,
    "message": "Department updated successfully"
}
```

#### DELETE departments

```http
  DELETE api/departments/{id}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** id department, parameter|

#### Response delete
```
{
    "status": true,
    "message": "Department deleted successfully"
}
```
#### GET employees paginate

```http
  GET /api/employees
```

```http
  GET /api/employees?page=2
```

#### Response employees
```
{
    "current_page": 1,
    "data": [
        
        {
            "id": 24,
            "name": "Sydnie Bergnaum Sr.",
            "email": "aric.koepp@herzog.com",
            "phone": "+18506906701",
            "department_id": 1,
            "created_at": "2023-08-31T18:35:23.000000Z",
            "updated_at": "2023-08-31T18:35:23.000000Z",
            "department": "Biological Science Teacher"
        },
        {
            "id": 3,
            "name": "Adrain Tromp",
            "email": "raphaelle76@wyman.biz",
            "phone": "+12053328535",
            "department_id": 2,
            "created_at": "2023-08-31T18:35:22.000000Z",
            "updated_at": "2023-08-31T18:35:22.000000Z",
            "department": "MARCOM Manager"
        },
        .
        .
        .
    ],
    "first_page_url": "http://localhost:8000/api/employees?page=1",
    "from": 1,
    "last_page": 3,
    "last_page_url": "http://localhost:8000/api/employees?page=3",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/employees?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": "http://localhost:8000/api/employees?page=2",
            "label": "2",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/employees?page=3",
            "label": "3",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/employees?page=2",
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": "http://localhost:8000/api/employees?page=2",
    "path": "http://localhost:8000/api/employees",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 25
}

```

#### GET employees all

```http
  GET /api/employeesall
``` 
#### Response
``` 
[
    
    {
        "id": 10,
        "name": "Prof. Ryleigh Haley",
        "email": "mertz.litzy@lindgren.com",
        "phone": "+18562006368",
        "department_id": 2,
        "created_at": "2023-08-31T18:35:23.000000Z",
        "updated_at": "2023-08-31T18:35:23.000000Z",
        "department": "MARCOM Manager"
    },
    {
        "id": 14,
        "name": "Pete Pacocha",
        "email": "chaz24@pouros.com",
        "phone": "+15209127248",
        "department_id": 2,
        "created_at": "2023-08-31T18:35:23.000000Z",
        "updated_at": "2023-08-31T18:35:23.000000Z",
        "department": "MARCOM Manager"
    }
]

``` 
#### GET employees by department

```http
    GET /api/employeesbydepartment
``` 
#### Response
``` 
[
    {
        "count": 4,
        "name": "Aircraft Launch and Recovery Officer"
    },
    {
        "count": 2,
        "name": "Biological Science Teacher"
    },
    {
        "count": 2,
        "name": "Conservation Scientist"
    },
    {
        "count": 7,
        "name": "Emergency Management Specialist"
    },
    {
        "count": 4,
        "name": "Maid"
    },
    {
        "count": 6,
        "name": "MARCOM Manager"
    }
]
``` 
#### POST register employee

```http
    POST  /api/employees
``` 
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required** name employee|
| `email`      | `string` | **Required** email employee|
| `phone`      | `string` | **Required** phone employee|
| `department_id`      | `string` | **Required** id department|

#### Response register employee
``` 
{
    "status": true,
    "message": "Employee creadted sauccessfully"
}
``` 
#### UPDATE employees

``` http
    PUT /api/employees/{id}
``` 
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** id employee, param route|
| `name`      | `string` | **Required** name employee|
| `email`      | `string` | **Required** email employee|
| `phone`      | `string` | **Required** phone employee|
| `department_id`      | `string` | **Required** id department|

#### Response
``` 
{
    "status": true,
    "data": {
        "id": 26,
        "name": "Lupe Rurwer",
        "email": "lupe@example.com",
        "phone": "0426565555",
        "department_id": 4,
        "created_at": "2023-08-31T23:10:47.000000Z",
        "updated_at": "2023-08-31T23:15:06.000000Z"
    }
}
``` 
#### DELETE employees
```http
    DELETE /api/employees/{id}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** id employee, param route|

#### Response
``` 
{
    "status": true,
    "message": "Employee deleted sauccessfully"
}
``` 


## Deployment

To deploy this project run

```bash
  php artisan serve
```


## Tech Stack

**Server:** Laravel 10
**Data Base:** MySQL


## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```


## Documentation

[Documentation](https://linktodocumentation)

