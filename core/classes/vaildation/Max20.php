<?php
namespace validation;
require_once 'validInterface.php';


class Max20 implements ValidInterface {

    private $name;
    private $value;

    public function __construct($name , $value) {
         $this->name = $name;
         $this->value = $value;

    }
    public function validate() {
        if (strlen($this->value) > 20) {
            return "$this->name must be less than 20 chars";
        }

        return '';
    }
}