<?php

if (!isset($POST['addemployee'])){
    ?>
<form method="post" action=""> <!-- παραμένει στην ίδια σελίδα στον κώδικα, αν δεν του βάλουμε συγκεκριμένο path -->
    <div class="form-group">
  <label for="username">UserName:</label><br> 
  <input type="text" id="username" name="username"><br> <br>
    </div>
    <div class="form-group">
     <label for="password">Κωδικός Χρήστη:</label><br> 
  <input type="text" id="password" name="password"><br> <br>
    </div>
    <div class="form-group">
    <label for="firstname">Όνομα:</label><br> 
  <input type="text" id="firstname" name="firstname"><br> <br>
    </div>
    <div class="form-group">
    <label for="surname">Επώνυμο:</label><br> 
  <input type="text" id="surname" name="surname"><br> <br>
    </div>
      <div class="form-group">
    <label for="status">Καταλληλότητα:</label><br> 
  <input type="text" id="status" name="status"><br> <br>
    </div>
    <div class="form-group">
    <label for="department">Τμήμα:</label><br> 
  <input type="text" id="department" name="department"><br> <br>
    </div>
     <div class="form-group">
    <label for="user_type">Δικαιώματα:</label><br> 
  <input type="text" id="user_type" name="user_type"><br> <br>
    </div>
     
     <button type="submit" class="btn btn-primary" id="addemployee" name="addemployee">
      <span class="glyphicon glyphicon-user"></span> Προσθήκη Υπαλλήλου
   </button>
   
    
</form>

    <?php
}

else {

}


