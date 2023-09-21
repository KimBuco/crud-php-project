<?php

class formValidation {

   
    public $formData; 
    public $error = [];


    public function validation(){
        $this->validateUsername();
        $this->validateEmail();
        // print_r($this->error);
        return $this->error;
    }


    public function __construct($post_data){
        $this->formData = $post_data;
    }

    public function validateUsername () {
        if (trim($this->formData['userName']) == ''){
            $this->addError('userName','username cannot be empty.'); 
        }
    }

    public function validateEmail (){
        if(trim($this->formData['email']) == ''){
            $this->addError('email','email cannot be empty.'); 
        }
    }


    public function addError ($input, $message) {
        $this->error[$input] = $message;
    }
}

?>