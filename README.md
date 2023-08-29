# Organizations generator & XML to JSON converter

Postman collection:  
`TestConverter.postman_collection.json`

## Generator
GET `/api/v1/generate-organizations`  
Query parameter: count (int)  
Response example: XML content in file: `example.xml`  

## Converter
POST `/api/v1/convert-organizations`  
Request parameter: data (application/xml content)  

--------

#### Сontainerization example:  
https://github.com/tlchrkv/VATCalculator  
See: `docker-compose.default.yml` and `build/`

