# REST API in PHP

> from [https://www.html.it/guide/rest-api-e-database-la-guida/](https://www.html.it/guide/rest-api-e-database-la-guida/)

CRUD application for a small library.

Features:

- **create** a book
- **read** a book
- **update** the book metadata
- **delete** a book

## REST and HTTP

| HTTP method | CRUD operation  | Description                            |
|-------------|-----------------|----------------------------------------|
| POST        | Create          | Create a new resource                  |
| GET         | Read            | Read a resource                        |
| PUT         | Update          | Update a resource or change his status |
| DELETE      | Delete          | Delete a resource                      |

## The first REST service

- [http://localhost/rest-api-php/book/read.php](http://localhost/rest-api-php/book/read.php)

## API: Create

```json
{
    "ISBN"   : "00000020dd02",
    "Author" : "Murakami Haruki",
    "Title"  : "Kafka sulla spiaggia"
}
```

