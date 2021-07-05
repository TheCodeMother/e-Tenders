<?php


class Eltender {
   
    var $id_el_tender;
    var $adequacy;
    var $contracting_authority;
    var  $deadline;
    var $executive_date;
    var $nmb_el_tnd;
    var $nmb_system;
    var $who_started_el_tnd ;
    var $who_end_el_tnd;
    var $dtm_start_el_tnd;
    var $dtm_end_el_tnd;
    var $supply_el_tnd;
    
    function __construct() {
        $this->id_el_tender=-1;
        $this->adequacy="";
        $this->contracting_authority="";
        $this->deadline="0001-01-01";
        $this->executive_date="0001-01-01";
        $this->nmb_el_tnd=-1;
        $this->nmb_system=-1;
       $this->who_started_el_tnd=-1;
       $this->who_end_el_tnd=-1;
       $this->dtm_start_el_tnd="0001-01-01";
       $this->dtm_end_el_tnd="0001-01-01";
       $this->supply_el_tnd="";
    }
    
    function getdb(){
    $db= new Database();
    $db->getEltender($this);
    }
    
    function setdb (){
    $db=new Database();
    $db->setEltender($this);
    
    }
}
