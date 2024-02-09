<?php

$conn = mysqli_connect("localhost", "root", "", "grocer");
$sql = "SELECT * FROM employee";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocer | Employee Menu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="http://localhost/myFolder/script.js"></script>
</head>
    <body>
    <div class="loaderEmployee hidden" id="loader">
        <i class="fas fa-seedling"></i>
    </div>

    <nav class="navbar">
        <div class="nav">
            <i class="fas fa-seedling"></i>
            <h1 class="heading"><a href="index.html">Grocer</a></h1>
        </div>
        <div class="links">
            <a href="login.php" class="navButton">Switch to Customer</a>
        </div>
    </nav>
    <div class="customerSection">    
        <div class="customerBox box">

    <?php
        if (mysqli_num_rows($result) > 0) {
            ?>

                <table class="tableEmp">
                    <thead>
                    <tr class="tableHead">
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                    </tr>
                    </thead>

                    <tbody class="employeeTable">
    <?php
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['Eid']."</td>";
            echo "<td>".$row['Ename']."</td>";
            echo "<td>".$row['Esalary']."</td>";
            echo "<td>".$row['Eaddress']."</td>";
            echo "<td>".$row['Ephone']."</td>";
            echo "</tr>";
        }
    ?>
                    </tbody>

                </table>
        </div>
        <div class="rightScreenOptions">
    
    <?php
                        if (array_key_exists('add', $_POST)) {
                                $Eid = $_REQUEST['employeeID'];
                                $Ename = $_REQUEST['employeeName'];
                                $Esalary = $_REQUEST['employeeSalary'];
                                $Eaddress = $_REQUEST['employeeAddress'];
                                $Ephone = $_REQUEST['employeePhoneNumber'];
    
                                $add = "INSERT INTO employee VALUES ('$Eid', '$Ename', '$Esalary', '$Eaddress', '$Ephone');";

                                if (mysqli_query($conn, $add)) {
                                    echo "<script>alert('Details added successfully')</script>";
                                } else {
                                    echo "<script>alert('Error, Try Again!')</script>";
                                }
                                header("Refresh:0");

                            }
                    ?>


            <form class="employeeProfile" method="POST">
                <div class="addEmployee">
                    <label for="employeeID">Employee ID</label>
                    <input class="eIdAdd" name="employeeID" id="Eid" type="number">                 
                    <label for="employeeName">Employee Name</label>
                    <input class="empName" name="employeeName" id="Ename" type="text">                 
                    <label for="employeeSalary">Employee Salary</label>
                    <input class="empSalary" name="employeeSalary" id="Esalary" type="number">                 
                    <label for="employeeAddress">Employee Address</Address></label>
                    <input class="empAddress" name="employeeAddress" id="Eaddress" type="text">                
                    <label for="employeePhoneNumber">Employee Phone Number</label>
                    <input class="empPhoneNumber" name="employeePhoneNumber" id="Ephone" type="number">
                    <button class="btn" value="add" name="add" type="submit">Add Employee</button>  
                </div>
                </form>

                <?php
                    if (array_key_exists('remove', $_POST)) {
                            $Eid = $_REQUEST['employeeID'];

                            $remove = "DELETE FROM employee WHERE Eid = '$Eid';";
                            
                            if (mysqli_query($conn, $remove)) {
                                echo "<script>alert('Details added successfully')</script>";
                            } else {
                                echo "<script>alert('Error, Try Again!')</script>";
                            }
                            header("Refresh:0");

                        }
                        ?>

                <form class="employeeProfile" method="POST">
                <div class="removeEmployee">
                    <label>Employee ID</label>
                    <input class="eIdRemove" name="employeeID" id="Eid" type="number">
                    <button class="btn" value="remove" name="remove" type="submit">Remove Employee</button>
                </div>
            </form>
    
        </div>
</div>
<footer class="copyright">
<h1 class="cpyrght">Developed by Akhin Abraham & Avlin Antony</h1>
</footer>

<?php
    }
    mysqli_close($conn);
?>

</body>
</html>
