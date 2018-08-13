<?php
// +----------------------------------------------------------------------
// | github: phpth
// +----------------------------------------------------------------------
// | Copyright (c) 2018
// +----------------------------------------------------------------------
// | Licensed MIT
// +----------------------------------------------------------------------
// | Author: luajia
// +----------------------------------------------------------------------
// | Date: 2018/8/13 0007
// +----------------------------------------------------------------------
// | Time: 下午 17:18
// +----------------------------------------------------------------------

namespace phpth\tool;

use ReflectionParameter;
use ReflectionMethod;
use ReflectionClass;
use Exception;

/**
 * 类的注释生成工具
 * Class classDoc
 * @package phpth\tool
 */
class classDoc
{
    /**
     * @param $class
     * @return array|string
     * @throws \ReflectionException
     */
    public function createDoc($class)
    {
        $ref_class = new ReflectionClass($class);
        $ref_method = $ref_class->getMethods();
        $ref_property = $ref_class->getProperties();
        //  title doc
        $doc[] = '/**';
        $doc[] = ' * Class '.$ref_class->getName();
        $doc[] = ' * @package '.$ref_class->getNamespaceName().$ref_class->getName();
        // property doc
        foreach($ref_property as $k=>$property)
        {
           if($property->isDefault())
           {
               $doc[] = ' * @property mixed $'. $property->getName();
           }
        }
        // method doc
        foreach($ref_method as $k=>$method)
        {
            $params= $method->getParameters();
            $param_list = [] ;
            foreach($params as $param)
            {
                $default = $this->getParamDefaultValue($param);
                $param_type = $param->getType()?:'mixed';
                $param_list[] =  $param_type.' $'.$param->name.($default!==false?' = '.$default :null) ;
            }
            $param_list = join(',',$param_list);

            $return_type = $method->getReturnType();
            if(!$return_type)
            {
                $return_type = $this->getReturnType($method);
            }
            if(!$return_type)
            {
                $return_type = 'null';
            }
            $doc[] = " * @method {$return_type} {$method->name}({$param_list}) ";
        }
        $doc[] = " */\r\n";
        $doc = join("\r\n",$doc);
        return $doc ;
    }

    protected function getReturnType( ReflectionMethod $method)
    {
        $return_type = false ;
        $doc_str = $method->getDocComment();
        $doc_str = preg_split('/(\/{0,1}\s*\*{1,2}\s+)|(\s+\*\/\s*)/', $doc_str);
        foreach($doc_str as $v)
        {
            if(stripos($v, '@return')!==false)
            {
                $return_type = preg_split('/\s+/', $v)[1]?:'null';
                break;
            }
        }
        return $return_type;
    }

    /**
     * @param ReflectionParameter $p
     * @return bool|mixed|string
     */
    protected function getParamDefaultValue( ReflectionParameter $p)
    {
        try{
            $value = $p->getDefaultValue();
            $type = gettype($value);
            switch (strtolower($type))
            {
                case 'double':
                case "integer":
                    break;
                case "boolean":
                    $value?$value='true':$value='false';
                    break;
                case 'unknown type':
                case "string" :
                    $value = "'{$value}'";
                    break;
                case "null":
                    $value='null';
                    break;
                case "array" :
                    $value = '['.join(',',$value).']';
                    break;
                case "object" :
                   break;
            }
            return $value;
        }catch (Exception $e)
        {
            return false ;
        }
    }
}
