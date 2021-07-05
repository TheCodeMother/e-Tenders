<?php


class Department {
    
    var $id_dpt;
    var $manager ;
    var $dpt_name;
    
    
      function __construct(){
          $this->id_dpt=-1;
          $this->manager=-1;
          $this->dpt_name="";
          
      }
       function getdb(){
    $db= new Database();
    $db->getDepartmant($this);
     }
     
     function setdb (){
    $db=new Database();
    $db->setDepartment($this);
     
     
     }
      
      
   
      
      }
    
    
    

