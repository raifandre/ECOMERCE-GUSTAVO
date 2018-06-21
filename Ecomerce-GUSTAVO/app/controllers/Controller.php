<?php

include_once('lib/Input.php');

class Controller {

    protected $input;

    public function __construct() {
        $this->input = new Input;
    }

}