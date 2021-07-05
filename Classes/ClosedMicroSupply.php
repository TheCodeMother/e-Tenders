<?php

class ClosedMicroSupply {
    
    
           
    var $id_cls_mcr_spl  ;
    var $adequacy;
    var $contracting_authority;
    var  $deadline;
    var $executive_date;
    var  $nmb_cls_mcr_spl;
    var $nmb_system;
    var $who_started_cls_mcr_spl ;
    var $who_end_cls_mcr_spl  ;
    var $dtm_start_cls_mcr_spl;
    var $dtm_end_cls_mcr_cls;
    var $supply_cls_mcr_cls;
    
    
     function __construct(){
         
         $this->id_cls_mcr_spl=-1;
         $this->adequacy="";
         $this->contracting_authority="";
         $this->deadline="0001-01-01";
         $this->executive_date="0001-01-01";
         $this->nmb_cls_mcr_spl="";
         $this->nmb_system=-1;
         $this->who_started_cls_mcr_spl=-1;
         $this->who_end_cls_mcr_spl=-1;
         $this->dtm_start_cls_mcr_spl="0001-01-01";
         $this->dtm_end_cls_mcr_cls="0001-01-01";
         $this->supply_cls_mcr_cls="";
         
        
     }
    
     function getdb(){
    $db= new Database();
    $db->getClosedMicroSupply($this);
     }
     
     function setdb (){
    $db=new Database();
    $db->setClosedMicroSupply($this);
     
     
     }
    
    
    
    
    
    
  
}
