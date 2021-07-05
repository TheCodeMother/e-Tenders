<?php


class ClosedTender {
    
       
    var $id_closed_tender ;
    var $adequacy;
    var $contracting_authority;
    var  $deadline;
    var $executive_date;
    var  $nmb_cls_tnd;
    var $nmb_system;
    var $who_started_cls_tnd;
    var $who_end_cls_tnd ;
    var $dtm_start_cls_tnd;
    var $dtm_end_cls_tnd;
    var $sypply_cls_tnd;
    
    
     function __construct(){
         
         $this->id_closed_tender=-1;
         $this->adequacy="";
         $this->contracting_authority="";
         $this->deadline="0001-01-01";
         $this->executive_date="0001-01-01";
         $this->nmb_cls_tnd="";
         $this->nmb_system=-1;
         $this->who_started_cls_tnd=-1;
         $this->who_end_cls_tnd=-1;
         $this->dtm_start_cls_tnd="0001-01-01";
         $this->dtm_end_cls_tnd="0001-01-01";
         $this->sypply_cls_tnd="";
         
        
     }
     
        
     function getdb(){
    $db= new Database();
    $db->getClosedTender($this);
     }
     
     function setdb (){
    $db=new Database();
    $db->setClosedTender($this);
     
     
     }
   
}
