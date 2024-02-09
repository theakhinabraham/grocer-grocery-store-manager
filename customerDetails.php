<?php

$conn = mysqli_connect("localhost", "root", "", "grocer");
$sql = "SELECT * FROM customer;";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocer | Customer Details</title>
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
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                    </tr>
                    </thead>

                    <tbody class="employeeTable">
    <?php
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['Cid']."</td>";
            echo "<td>".$row['Cname']."</td>";
            echo "<td>".$row['Caddress']."</td>";
            echo "<td>".$row['Cphone']."</td>";
            echo "</tr>";
        }
    ?>
                    </tbody>

                </table>
        </div>
        <div class="rightScreenOptions">
    
    <?php
                        if (array_key_exists('addCust', $_POST)) {
                                $Cid = $_REQUEST['customerID'];
                                $Cname = $_REQUEST['customerName'];
                                $Caddress = $_REQUEST['customerAddress'];
                                $Cphone = $_REQUEST['customerPhoneNumber'];

                                $addCust = "INSERT INTO customer VALUES ('$Cid', '$Cname', '$Caddress', '$Cphone');";

                                if (mysqli_query($conn, $addCust)) {
                                    echo "<script>alert('Details added successfully')</script>";
                                } else {
                                    echo "<script>alert('Error, Try Again!')</script>";
                                }
                                header("Refresh:0");

                            }
                    ?>


            <form class="employeeProfile" method="POST">
                <div class="addEmployee">
                    <label for="employeeID">Customer ID</label>
                    <input class="eIdAdd" name="customerID" id="Cid" type="number">                 
                    <label for="employeeName">Customer Name</label>
                    <input class="empName" name="customerName" id="Cname" type="text">                 
                    <label for="employeeSalary">Customer Address</label>
                    <input class="empSalary" name="customerAddress" id="Caddress" type="text">                 
                    <label for="employeeAddress">Customer Phone Number</label>
                    <input class="empAddress" name="customerPhoneNumber" id="Cphone" type="number">                
                    <button class="btn" value="addCust" name="addCust" type="submit">Add Customer</button>  
                </div>
                </form>

                <?php
                    if (array_key_exists('remove', $_POST)) {
                            $Cid = $_REQUEST['customerID'];

                            $removeCust = "DELETE FROM customer WHERE Cid = '$Cid';";
                            
                            if (mysqli_query($conn, $removeCust)) {
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
                    <input class="eIdRemove" name="customerID" id="Cid" type="number">
                    <button class="btn" value="remove" name="remove" type="submit">Remove Customer</button>
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
