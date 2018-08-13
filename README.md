# tool
php classdoc create tool
> use 
- code
```php
namespace test;

use phpth\tool\classDoc;

use \Exception;


include_once 'classDoc.php';
$doc = new classDoc();

//notice : php version should be than 7.0

try{
    //mysqli doc
    echo $doc->createDoc ( '\mysqli');

    //CURLFile
    echo $doc->createDoc ( '\CURLFile');
}
catch (Exception $e)
{

    echo "Exception: {$e->getMessage ()}";
}

```
