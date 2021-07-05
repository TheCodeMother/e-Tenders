<?php


class Elmicrosupply {
    
    var $id_el_mcr_spl;
    var $adequacy;
    var $contracting_authority;
    var  $deadline;
    var $executive_date;
    var $nmb_el_mcr_spl;
    var $nmb_system;
    var $who_started_el_mcr_spl;
    var $who_end_el_mcr_spl;
    var $dtm_start_el_mcr_spl;
    var $dtm_end_el_mcr_spl;
    var $supply_el_mcr_spl;
    
    
     function __construct(){
         
         $this->id_el_mcr_spl=-1;
         $this->adequacy="";
         $this->contracting_authority="";
         $this->deadline="0001-01-01";
         $this->executive_date="0001-01-01";
         $this->nmb_el_mcr_spl="";
         $this->nmb_system=-1;
         $this->who_started_el_mcr_spl=-1;
         $this->who_end_el_mcr_spl=-1;
         $this->dtm_start_el_mcr_spl="0001-01-01";
         $this->dtm_end_el_mcr_spl="0001-01-01";
         $this->supply_el_mcr_spl="";
         
  
     }
     
     function getdb(){
    $db= new Database();
    $db->getElmicrosupply($this);
     }
     
     function setdb (){
    $db=new Database();
    $db->setElmicrosupply($this);
     
     
     }
    
}

