<?php
namespace validation;
require_once 'ValidInterface.php';
require_once 'Max20.php';
require_once 'Min5.php';
require_once 'numeric.php';
require_once 'str.php';
require_once 'required.php';
require_once 'email.php';




// use validation\Email;
// use validation\Max;
// use validation\Numeric;
// use validation\Required;
// use validation\Str;
// use validation\ValidInterface;

class Validator {

    public $errors = [];

    private function makeValidation (ValidInterface $v) {
          return $v->validate();
    }

    public function rules ($name , $value , array $rules) {
        foreach ($rules as $rule) {
            if ($rule == 'required') {
              $error =  $this->makeValidation(new Required($name , $value));
            } else if ($rule == 'string') {
                $error =  $this->makeValidation(new Str($name , $value));
            } else if ($rule == 'email') {
                $error =  $this->makeValidation(new Email($name , $value));
            } else if ($rule == 'max:20') {
                $error =  $this->makeValidation(new Max20($name , $value));
            } else if ($rule == 'min:5') {
                $error =  $this->makeValidation(new Min5($name , $value));
            } else if ($rule == 'numeric') {
                $error =  $this->makeValidation(new Numeric($name , $value));
            } else {
                $error = '';
            }


            if ($error !== '')
            $this->errors[$name] =$error;
            //   array_push($this->errors , $error);

        }
    }
}