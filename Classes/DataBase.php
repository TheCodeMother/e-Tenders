<?php

//PDO PHP CONNECTION TO DATABASE
//PDO PHP EXECUTE QUERY TO DATABASE


class Database {

    var $host; // είναι η IP του server που σηκώνεται η βάση δεδομένων
    private $database; //το όνομα της database
    private $user; //το όνομα χρήστη που έχουμε ορίσει για να έχει πρόσβαση στη database, λογαριασμός χρήστη της MySQL
    private $pass; // το password του ανωτέρω χρήστη
    private $pdo;
    private $opt;

    public function __construct() {
        $this->host = "127.0.0.1"; 
        $this->database = "etenders";
        $this->user = "voula";
        $this->pass = "inferno@9";
    }

    
    public function connect() {
        $this->opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false];
        $conString = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=utf8";
       // mysql:host=127.0.0.1; dbname=eTenders; charset=utf8;
        $this->pdo = new PDO($conString, $this->user, $this->pass, $this->opt);//η PDO είναι η μέθοδος για να συνδέσουμε τη PHP με τη βάση μας στη mysql, τα opt είναι τα errors που μας φέρνει πίσω
    }

    //sql= το string που θα χρησιμοποιηθεί για το query και array= θα είναι το αντικείμενο το οποίο θα μας έρθουν πίσω τα δεδομένα.
    public function execute($sql, $array) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($array);
        return $stmt;
    }
    
    // employee functions
    
    function login(&$emp)
    {
        $this->connect();
        $query="SELECT `id_emp`, `firstname`, `surname`, `status`, `department` ,`username`,`user_type`  FROM employee
                WHERE `username`=? AND `password`=? ";
        $res= $this->execute($query, [$emp->username, $emp->password]);
        if ($res->rowCount()==1){
            $row=$res->fetch();
            $emp->id_emp=$row['id_emp'];
            $emp->firstname=$row['firstname'];
            $emp->surname=$row['surname'];
            $emp->status=$row['status'];
            $emp->department=$row['department'];
            $emp->username=$row['username'];
            $emp->user_type=$row['user_type'];
        }
       
        
    }
    
    
    public function getEmployee(&$employee){
        $this->connect(); //καλώ την συνάρτηση connect για να γίνει σύνδεση με τη βάση
        $res= $this->execute("SELECT username,id_emp,firstname, surname,status,department 
            FROM `employee`WHERE id_emp=?;", [$employee->id_emp]); //η res είναι μεταβλητή για να γίνεταο η αποθήκευση των αποτελεσμάτων
        $row= $res->fetch(); //παίρνει τα δεδομένα από την sql και τα "οργανώνει" σύμφωνα με το query που του έχουμε κάνει  
        $employee->id_emp=$row['id_emp'];
         $employee->username=$row['username'];
         $employee->firstname=$row['firstname'];
         $employee->surname=$row['surname'];
         $employee->status=$row['status'];
         $employee->department=$row['department'];
                
    }//end of getEmployee()
    
    public function setEmployee(&$employee){
      $this->connect();
      $que="INSERT INTO `employee`( `username`, `password`, `firstname`, `surname`, `status`, `department`) "
              . "VALUES (?,?,?,?,?,?)"; 
      $this->execute($que, [$employee->username,$employee->password,$employee->firstname,$employee->surname,
         $employee->status, $employee-> department]);
      
   }//end of setEmployee()
   
   
   
   
    // eltender functions
    
    public function getEltender(&$eltender){
        $this->connect(); //καλώ την συνάρτηση connect για να γίνει σύνδεση με τη βάση
        $res= $this->execute("SELECT `id_el_tender`, `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_el_tnd`, 
        `nmb_system`, `who_started_el_tnd`, `who_end_el_tnd`, `dtm_start_el_tnd`, `dtm_end_el_tnd`, `supply_el_tnd` 
         FROM `el_tender` WHERE id_el_tender=?;", [$eltender->id_el_tender]); //η res είναι μεταβλητή για να γίνεταο η αποθήκευση των αποτελεσμάτων
        $row= $res->fetch(); //παίρνει τα δεδομένα από την sql και τα "οργανώνει" σύμφωνα με το query που του έχουμε κάνει  
       
         $eltender->id_el_tender=$row['id_el_tender'];
         $eltender->adequacy=$row['adequacy'];
         $eltender->contracting_authority=$row['contracting_authority'];
         $eltender->deadline=$row['deadline'];
          $eltender->executive_date=$row['executive_date'];
          $eltender->nmb_el_tnd=$row['nmb_el_tnd'];
          $eltender->nmb_system=$row['nmb_system'];
          $eltender->who_started_el_tnd=$row['who_started_el_tnd'];
          $eltender->who_end_el_tnd=$row['who_end_el_tnd'];
          $eltender->dtm_start_el_tnd=$row['dtm_start_el_tnd'];
          $eltender->dtm_end_el_tnd=$row['dtm_end_el_tnd'];
          $eltender->supply_el_tnd=$row['supply_el_tnd'];
                
    }//end of getEltender()
   
   
     public function setEltender(&$eltender){
      $this->connect();
      $que= "INSERT INTO `el_tender`( `adequacy`, `contracting_authority`, `deadline`, `executive_date`, 
          `nmb_el_tnd`, `nmb_system`, `who_started_el_tnd`, `who_end_el_tnd`, `dtm_start_el_tnd`, `dtm_end_el_tnd`, `supply_el_tnd`) 
              VALUES (?,?,?,?,?,?,?,?,?,?,?)";  
      $this->execute($que, [$eltender->adequacy,$eltender->contracting_authority,$eltender->deadline,
         $eltender->executive_date,$eltender->nmb_el_tnd,$eltender->nmb_system,$eltender->who_started_el_tnd,$eltender->who_end_el_tnd,
         $eltender->dtm_start_el_tnd,$eltender->dtm_end_el_tnd,$eltender->supply_el_tnd]);
      
   }//end of setEltender()
   
   
   
  
    // elmicrosupply functions
    
    public function getElmicrosupply(&$elmicrosupply){
        $this->connect(); //καλώ την συνάρτηση connect για να γίνει σύνδεση με τη βάση
        $res= $this->execute("SELECT `id_el_mcr_spl`, `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_el_mcr_spl`, `nmb_system`, 
          `who_started_el_mcr_spl`, `who_end_el_mcr_spl`, `dtm_start_el_mcr_spl`,
           `dtm_end_el_mcr_spl`, `sypply_el_mcr_spl` FROM `el_micro_supply` WHERE  id_el_mcr_spl=?", [$elmicrosupply->id_el_mcr_spl]); //η res είναι μεταβλητή για να γίνεταο η αποθήκευση των αποτελεσμάτων
        
        $row= $res->fetch(); //παίρνει τα δεδομένα από την sql και τα "οργανώνει" σύμφωνα με το query που του έχουμε κάνει  
         $elmicrosupply->id_el_mcr_spl=$row['id_el_mcr_spl'];
         $elmicrosupply->adequacy=$row['adequacy'];
         $elmicrosupply->contracting_authority=$row['contracting_authority'];
         $elmicrosupply->deadline=$row['deadline'];
          $elmicrosupply->executive_date=$row['executive_date'];
          $elmicrosupply->nmb_el_mcr_spl=$row['nmb_el_mcr_spl'];
          $elmicrosupply->nmb_system=$row['nmb_system'];
          $elmicrosupply->who_started_el_mcr_spl=$row['who_started_el_mcr_spl'];
          $elmicrosupply->who_end_el_mcr_spl=$row['who_end_el_mcr_spl'];
          $elmicrosupply->dtm_start_el_mcr_spl=$row['dtm_start_el_mcr_spl'];
          $elmicrosupply->dtm_end_el_mcr_spl=$row['dtm_end_el_mcr_spl'];
          $elmicrosupply->sypply_el_mcr_spl=$row['sypply_el_mcr_spl'];
                
    }//end of getElmicrosupply()
    
    
         public function setElmicrosupply (&$elmicrosupply){
      $this->connect();
      $que= "INSERT INTO `el_micro_supply`( `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_el_mcr_spl`, 
          `nmb_system`, `who_started_el_mcr_spl`, `who_end_el_mcr_spl`, `dtm_start_el_mcr_spl`, `dtm_end_el_mcr_spl`, `sypply_el_mcr_spl`)
           VALUES (?,?,?,?,?,?,?,?,?,?,?)";  

             
      $this->execute($que, [$elmicrosupply->adequacy,$elmicrosupply->contracting_authority,$elmicrosupply->deadline,
         $elmicrosupply->executive_date,$elmicrosupply->nmb_el_mcr_spl,$elmicrosupply->nmb_system,$elmicrosupply->who_started_el_mcr_spl,$elmicrosupply->who_end_el_mcr_spl,
         $elmicrosupply->dtm_start_el_mcr_spl,$elmicrosupply->dtm_end_el_mcr_spl,$elmicrosupply->sypply_el_mcr_spl]);
      
   }//end of setElmicrosupply()
    
    
   //start function getDepartment
   
   public function getDepartmant (&$department){
       $this->connect(); //καλώ την συνάρτηση connect για να γίνει σύνδεση με τη βάση
        $res= $this->execute ("SELECT `id_dpt`, `manager`, `dpt_name` FROM `department` WHERE id_dpt=?;", [$department->id_dpt]);
          $row= $res->fetch(); //παίρνει τα δεδομένα από την sql και τα "οργανώνει" σύμφωνα με το query που του έχουμε κάνει  
         $department->id_dpt=$row['id_dpt'];
         $department->manager=$row['manager'];
         $department->dpt_name=$row['dpt_name'];
   } //end of getDepartment () , επίσης η σύνδεση του iddepartment είναι στοσχεσιακό με το department  στην οντότητα employeeα δκαταλάβει στη php [$department->id_dpt]?
   
   //start function setDepartment
    
   public function setDepartment (&$department){
        $this->connect();
      $que= ("INSERT INTO `department`( `dpt_name`, `manager`) VALUES (?,?)");
       $this->execute($que, [ $department->dpt_name, $department->manager]);
   } //end of function setDepartment()

   
   
    // getclosedtender functions
    
    public function getClosedTender(&$closedtender){
        $this->connect(); //καλώ την συνάρτηση connect για να γίνει σύνδεση με τη βάση
        $res= $this->execute("SELECT `id_closed_tender`, `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_cls_tnd`, "
                . "`who_started_cls_tnd`,`who_end_cls_tnd`, `dtm_start_cls_tnd`, `dtm_end_cls_tnd`, `sypply_cls_tnd` FROM `closed_tender` "
                . "WHERE id_closed_tender=?", [$closedtender->id_closed_tender]); //η res είναι μεταβλητή για να γίνεταο η αποθήκευση των αποτελεσμάτων
        
        $row= $res->fetch(); //παίρνει τα δεδομένα από την sql και τα "οργανώνει" σύμφωνα με το query που του έχουμε κάνει  
         $closedtender->id_closed_tender=$row['id_closed_tender'];
         $closedtender->adequacy=$row['adequacy'];
         $closedtender->contracting_authority=$row['contracting_authority'];
         $closedtender->deadline=$row['deadline'];
          $closedtender->executive_date=$row['executive_date'];
          $closedtender->nmb_cls_tnd=$row['nmb_cls_tnd'];
          $closedtender->nmb_system=$row['nmb_system'];
          $closedtender->who_started_cls_tnd=$row['who_started_cls_tnd'];
          $closedtender->who_end_cls_tnd=$row['who_end_cls_tnd'];
          $closedtender->dtm_start_cls_tnd=$row['dtm_start_cls_tnd'];
          $closedtender->dtm_end_cls_tnd=$row['dtm_end_cls_tnd'];
          $closedtender->sypply_cls_tnd=$row['sypply_cls_tnd'];
                
    }//end of getclosedtender()
   
   //start setclosedtender
    
     public function setClosedTender (&$closedtender){
      $this->connect();
      $que= "INSERT INTO `closed_tender`( `adequacy`, `contracting_authority`, `deadline`, `executive_date`,"
              . " `nmb_cls_tnd`, `who_started_cls_tnd`, `who_end_cls_tnd`, `dtm_start_cls_tnd`, `dtm_end_cls_tnd`, `sypply_cls_tnd`)
           VALUES (,?,?,?,?,?,?,?,?,?,?)";  
   
      
       $this->execute($que, [$closedtender->adequacy,$closedtender->contracting_authority,$closedtender->deadline,
           $closedtender->executive_date, $closedtender->nmb_cls_tnd, $closedtender->nmb_system,$closedtender->who_started_cls_tnd,$closedtender->who_end_cls_tnd,
           $closedtender->dtm_start_cls_tnd,$closedtender->dtm_end_cls_tnd,$closedtender->sypply_cls_tnd]);
           
     }//end of function setclosedtender
      
      
      
     
     
     
     //start of function getclosedmicrosupply
     
     public function getClosedMicroSupply (&$closedmicrosupply){
          $this->connect(); //καλώ την συνάρτηση connect για να γίνει σύνδεση με τη βάση
        $res= $this->execute ("SELECT `id_cls_mcr_spl`, `adequacy`, `contracting_authority`, `deadline`,"
        . " `executive_date`, `nmb_cls_mcr_spl`, `who_started_cls_mcr_spl`, `who_end_cls_mcr_spl`, `dtm_start_cls_mcr_spl`, "
        . "`dtm_end_cls_mcr_cls`, `supply_cls_mcr_cls` FROM `closed_micro_supply` WHERE id_cls_mcr_spl=?", [$closedmicrosupply->id_cls_mcr_spl]); //η res είναι μεταβλητή για να γίνεταο η αποθήκευση των αποτελεσμάτων)
         
         $row= $res->fetch(); //παίρνει τα δεδομένα από την sql και τα "οργανώνει" σύμφωνα με το query που του έχουμε κάνει  
         $closedmicrosupply->id_cls_mcr_spl=$row['id_cls_mcr_spl'];
         $closedmicrosupply->adequacy=$row['adequacy'];
         $closedmicrosupply->contracting_authority=$row['contracting_authority'];
         $closedmicrosupply->deadline=$row['deadline'];
          $closedmicrosupply->executive_date=$row['executive_date'];
          $closedmicrosupply->nmb_cls_mcr_spl=$row['nmb_cls_mcr_spl'];
          $closedmicrosupply->nmb_system=$row['nmb_system'];
          $closedmicrosupply->who_started_cls_mcr_spl=$row['who_started_cls_mcr_spl'];
          $closedmicrosupply->who_end_cls_mcr_spl=$row['who_end_cls_mcr_spl'];
          $closedmicrosupply->dtm_start_cls_mcr_spl=$row['dtm_start_cls_mcr_spl'];
          $closedmicrosupply->dtm_end_cls_mcr_cls=$row['dtm_end_cls_mcr_cls'];
          $closedmicrosupply->supply_cls_mcr_cls=$row['supply_cls_mcr_cls'];
     } //end of getclosedmicrosupply ()
     
     
     
     // start of function setclosedmicrosupply
     
     public function setClosedMicroSupply ($closedmicrosupply){
         $this->connect();
      $que= "INSERT INTO `closed_micro_supply`( `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_cls_mcr_spl`,"
      . " `who_started_cls_mcr_spl`, `who_end_cls_mcr_spl`, `dtm_start_cls_mcr_spl`, `dtm_end_cls_mcr_cls`, `supply_cls_mcr_cls`   "
              . "VALUES (?,?,?,?,?,?,?,?,?,?,?)";  
      
      execute($que,[$closedmicrosupply->adequacy,$closedmicrosupply->contracting_authority,$closedmicrosupply->deadline,
          $closedmicrosupply->executive_date,$closedmicrosupply->nmb_cls_mcr_spl,$closedmicrosupply->nmb_system,$closedmicrosupply->who_started_cls_mcr_spl,
           $closedmicrosupply->who_end_cls_mcr_spl,  $closedmicrosupply->dtm_start_cls_mcr_spl,$closedmicrosupply->dtm_end_cls_mcr_cls,$closedmicrosupply->supply_cls_mcr_cls]);
   
     } //end of function setclosedmicrosupply ()
      
   
} //end of class