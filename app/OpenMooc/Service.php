<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 2:14 PM
 */

namespace OpenMooc;


class Service
{
 private $errors;//array of errors

    public function setErrors($error){
        if(is_array($error))
            $this->errors=$error;
        $this->errors[]=$error;
    }
    public  function errors(){
        return $this->errors;
    }
}