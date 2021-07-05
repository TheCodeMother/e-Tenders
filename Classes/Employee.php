<?php


class Employee {
    var $id_emp;
    var $username;
    var $password;
    var $firstname;
    var $surname;
    var $status;
    var $department;
    var $user_type;
    
    function __construct() {
        $this->id_emp=-1;
        $this->username="";
        $this->password="";
        $this->firstname="";
        $this->surname="";
        $this->status="";
        $this->department=-1;
        $this->user_type=-1;
        }
        
        function getdb(){
         $db= new Database();
         $db->getEmployee($this);
            
        }
        
        function setdb (){
            $db=new Database();
            $db->setEmployee($this);    
            }
            
        function login(){
            $db=new Database();
            $db->login($this);
        }

 }