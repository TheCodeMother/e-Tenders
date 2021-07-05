<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#password").keyup(checkPasswordMatch);
        $("#confirmpassword").keyup(checkPasswordMatch);



        function checkPasswordMatch()
        {
            var password = $("#password").val();
            var confirmPassword = $("#confirmpassword").val();

            if (password !== "" && password === confirmPassword) {
                if (password.length < 5) {
                    document.getElementById("AddUser").innerHTML = "Τουλάχιστον 5 χαρακτήρες";
                    document.getElementById("AddUser").style.backgroundColor = "brown";
                    password.focus();
                }


            }
            if (password !== confirmPassword) {
              
                document.getElementById("AddUser").disabled = true;
                document.getElementById("AddUser").innerHTML = "Οι κωδικοί πρόσβασης δέν ταιριάζουν";
                document.getElementById("AddUser").style.backgroundColor = "red";

            } else {
               
                document.getElementById("AddUser").disabled = false;
                document.getElementById("AddUser").innerHTML = "Προσθήκη Χρήστη";
                document.getElementById("AddUser").style.backgroundColor = "green";
            }
        }

    });
</script>
<?php
if (!isset($_POST['AddUser'])) {
    ?>

    <div id="addUser" class="col-lg-4">
        <h3>Προσθήκη Χρήστη</h3>
        <form action="" method="post">     
            <div class="form-group">
                <label for="user_reg_num">Αριθμός μητρώου </label>
                <input type="text" id="user_reg_num" name="user_reg_num" required class="form-control">
            </div>  

            <div class="form-group">
                <label for="user_rank">Βαθμός </label>
                <input type="text" id="user_rank" name="user_rank" required class="form-control">
            </div>       

            <div class="form-group">
                <label for="user_first_name"> Όνομα </label>
                <input type="text" id="user_first_name" name="user_first_name" required class="form-control">
            </div> 
            <div class="form-group">
                <label for="user_last_name">Επίθετο </label>
                <input type="text" id="user_last_name" name="user_last_name" class="form-control" required>
            </div>  

            <div class="form-group">
                <label for="crew_of_pennant">Π.Πλοίο ή Ν.Υπηρεσία</label>
                <select id="crew_of_pennant" name="crew_of_pennant" required class="form-control">
                    <?php
                    $ships = Ship::getAll();
                    echo "<option disabled selected value> -- Επιλέξτε Π.Πλοίο ή Ν.Υπηρεσία -- </option>";
                    for ($i = 0; $i < sizeof($ships); $i++) {
                        echo "<option " . $sel . " value='" . $ships[$i]->pennant . "'>";
                        echo $ships[$i]->pennant . " || " . $ships[$i]->ship_name;
                        echo "</option>";
                    }
                    ?>
                </select>
            </div> 
            
            <div class="form-group">
                <label for="user_title">Καθήκοντα Στην Υπηρεσία</label>
                <input type="text" id="user_title" name="user_title" class="form-control" required>
            </div> 

            <div class="form-group">
                <label for="username">Username  </label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>  
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>  
            <div class="form-group">
                <label for="confirmpassword">Επιβεβαίωση Password </label>
                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required>
            </div>  

            <div class="form-group">
                <label for="user_type">Δικαιώματα στην Εφαρμογή</label>
                <select id="user_type" name="user_type" required class="form-control">
                    <?php
                    $usertype = User_Types::getAll();
                    echo "<option disabled selected value> -- Επιλέξτε Δικαιώματα Χρήστη -- </option>";
                    for ($i = 0; $i < sizeof($usertype); $i++) {
                        echo "<option " . $sel . " value='" . $usertype[$i]->utype_code . "'>";
                        echo $usertype[$i]->user_rights;
                        echo "</option>";
                    }
                    ?>
                </select>
            </div> 
            <button style="float: right" type="submit" name="AddUser" id="AddUser" value="Προσθήκη" class="btn btn-info "><span class="glyphicon glyphicon-plus-sign"></span> Καταχώρηση Χρήστη</button>
            <button style="float: left; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = 'Index.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Ακύρωση</button>

        </form>
    </div>
    <?php
} else {
    $UINS = new Users();

    $UINS->user_rank = $_POST['user_rank'];
    $UINS->user_title = $_POST['user_title'];
    $UINS->user_first_name = $_POST['user_first_name'];
    $UINS->user_last_name = $_POST['user_last_name'];
    $UINS->crew_of_pennant = $_POST['crew_of_pennant'];
    $UINS->user_reg_num = $_POST['user_reg_num'];
    $UINS->username = $_POST['username'];
    $UINS->password = $_POST['password'];
    $UINS->password = sha1($UINS->password);
    $UINS->user_type = $_POST['user_type'];
    $UINS->setDb();
    echo "Επιτυχής Καταχώρησης Χρήστη";
    ?> <script>
            alert("<?php echo 'Ο χρήστης είναι έτοιμος για είσοδο στην εφαρμογή'; ?>");
            window.location = "Index.php?action=10";
    </script>
    <?php
    //ayth einai mia allagh
    
}
?>
