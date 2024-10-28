<?php
class Request{
    public $rule=[];
    public $result;
    public $message = [];
    public function __construct($rule)
    {
        $this->rule = $rule;
    }
    public function validate($rule)
    {
         
    }
}
?>
