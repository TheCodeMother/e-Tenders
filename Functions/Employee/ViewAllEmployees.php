<h2>Προβολή όλων των Υπαλλήλων</h2>


<table class="table table-striped">
        <thead>
            <tr>
                <th>Επώνυμο</th>
                <th>Όνομα</th>
                <th>Username</th> 
                <th>Καταλληλότητα</th>
                <th>Τμήμα</th>
                <th>Δικαιώματα Χρήστη</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $DB = new Database();
                $DB->connect();
                $res = $DB->execute("SELECT `firstname`,`surname`,`status`,`username`,department.dpt_name,user_types.user_type_desc 
                                        FROM `employee`JOIN department ON employee.department=department.id_dpt
                                        JOIN user_types ON employee.user_type=user_types.user_type_id
                                        ORDER BY surname ASC", []);
                while ($row = $res->fetch()) {
                    echo "<td>" . $row['surname'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['dpt_name'] . "</td>";
                    echo "<td>" . $row['user_type_desc'] . "</td>";
                    
                    ?>
                    
                    <?php
                    echo "</tr>";
                }
                ?>
                   </tbody>
            </table>



                

