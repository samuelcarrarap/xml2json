# xml2json
PHP class that converts XML to JSON.

**BASIC USAGE**
````php
require_once('XML2Json.class.php');

$xml = '<books><title>The Chronicles of Narnia</title><title>The Chronicles of Narnia</title></books>';

$xml2json = new Json2XML();

$json = $xml2json->convert($xml);

echo $json;
````

**RESULT**
````json
{"books":{"title":["The Chronicles of Narnia","The Chronicles of Narnia"]}}
````

------------------------------------------------------------------------------------------------------

**USAGE WITH PRETTIFY**
````php
require_once('XML2Json.class.php');

$xml = '<books><title>The Chronicles of Narnia</title><title>The Chronicles of Narnia</title></books>';

$xml2json = new Json2XML(true);

$json = $xml2json->convert($xml);

echo $json;
````

**RESULT WITH PRETTIFY**
````json
{
    "books": {
        "title": [
            "The Chronicles of Narnia",
            "The Chronicles of Narnia"
        ]
    }
}
````
