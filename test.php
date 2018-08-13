<?php
// +----------------------------------------------------------------------
// |  github: phpth
// +----------------------------------------------------------------------
// | Copyright (c) 2018
// +----------------------------------------------------------------------
// | Licensed MIT
// +----------------------------------------------------------------------
// | Author: luajia
// +----------------------------------------------------------------------
// | Date: 2018-8-13
// +----------------------------------------------------------------------
// | Time: 下午 06:15
// +----------------------------------------------------------------------
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


