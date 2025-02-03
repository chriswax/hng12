# Number Classification API

This API classifies a given number and provides interesting mathematical properties about it, along with a fun fact.

## Resources

- [Fun fact API](http://numbersapi.com/#42)
- [Wikipedia - Parity (Mathematics)](https://en.wikipedia.org/wiki/Parity_(mathematics))

## Task Description

Create an API that accepts a number and returns:
1. Mathematical properties of the number (such as whether it is prime, perfect, odd/even, Armstrong number, etc.).
2. A fun fact about the number.

The fun fact should be fetched from the Numbers API.

## Requirements

### Technology Stack:
- You may choose any programming language or framework (C#, PHP, Python, Go, Java, JS/TS).

## API Specification

### Endpoint:
`GET <your-domain.com>/api/classify-number?number=371`

### JSON Response Format (200 OK):

```json
{
  "number": 371,
  "is_prime": false,
  "is_perfect": false,
  "properties": ["armstrong", "odd"],
  "digit_sum": 11,
  "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}


### Endpoint:
`GET <your-domain.com>/api/classify-number?number=hello`

### JSON Response Format (400  Bad Request):

```json
{
  "number": "alphabet",
  "error": true
}


## Authors

### Uzoigwe Christian


## 🚀 About Me
### I'm a backend developer
### https://hng.tech/hire/php-developers


## 🛠 Skills
#### Vanilla PHP, Laravel, C#


## Installation

```bash
  Install Xampp 
  Copy project to htdocs
  Run Locally using browser or Postman
  ::http://localhost/hng12/api/classify-number?number=hello
```
    
## 🔗 Project Github Link
https://github.com/chriswax/hng12/tree/main/Stage%201%20-%20Number%20Classification%20API
