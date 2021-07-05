<?php 

if (!isset($_POST['username'])) { // αν δεν έχω πατήσει το κουμπί (στη συγκεκριμένη περίπτωση "είσοδος") και να μείνει σταθερή η φόρμα 
        ?>
   
<form method="post" action="">
    <div class="form-group">
  <label for="username">UserName:</label><br> 
  <input type="text" id="username" name="username"><br> <br>
    </div>
    <div class="form-group">
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"> <br> <br>
   </div>
  <button type="submit" class="btn btn-primary" id="submitlogin" name="submitlogin">
      <span class="glyphicon glyphicon-user"></span> Είσοδος
   </button>
  <button type="reset" class="btn btn-warning" id="reset" name="reset"> Απαλοιφή 
      <span class="glyphicon glyphicon-repeat"></span> </button>

</form>   
        
    <?php } 
  else //οταν σου δωσω username & password
  {
      $empl=new Employee();  
      
      $empl->username= $_POST['username'];
      $empl->password= $_POST['password'];
      $empl->login();
      
      if ($empl->id_emp!==-1)
      { //Απο την login() μου ήρθε id κάποιου employee της εφραμογής μου άρα έχω επιτυχή login
       
      $_SESSION['username']=$empl->username;
      $_SESSION['firstname']=$empl->firstname;
      $_SESSION['surname']=$empl->surname;
      $_SESSION['department']=$empl->department;
      $_SESSION['user_type']=$empl->user_type;
      
      header('location:index.php');   
        }
      
      else
      {
      header('location:index.php');    
      }
        
   
  }