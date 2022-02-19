<?php
    $conn = mysqli_connect("localhost", "root", "", "grocer");
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocer | Store Owner Menu</title>
    <link rel="stylesheet" href="http://localhost/myFolder/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="http://localhost/myFolder/script.js"></script>
</head>
    <body>
    <div class="loaderStoreOwner hidden" id="loader">
        <i class="fas fa-seedling"></i>
    </div>
    <nav class="navbar">
        <div class="nav">
            <i class="fas fa-seedling"></i>
            <h1 class="heading"><a href="http://localhost/myFolder/index.html">Grocer</a></h1>
        </div>
        <div class="links">
        <a href="http://localhost/myFolder/login.php" class="navButton">Switch to Customer</a>
        </div>
    </nav>
    <div class="customerSection">    
        <div class="customerBox box">
            
            <?php
                if (mysqli_num_rows($result) > 0) {
                    ?>
            
            <table class="table">
                    <thead>
                    <tr class="tableHead">
                        <th>Product ID</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Remaining Stock (in KG)</th>
                    </tr>
                    </thead>
                    <tbody class="customerTable">
                   
                   <?php
           
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>".$row['Pid']."</td>";
               echo "<td>".$row['Pname']."</td>";
               echo "<td>".$row['Pprice']."</td>";
               echo "<td>".$row['Pstock']."</td>";
               echo "</tr>";
           } ?>
            

                    </tbody>
                </table>
        </div>
        <div class="rightScreenOptions">
            <div class="employeeMenu">
                <a href="http://localhost/myFolder/employee.php" class="optionButton">Employee Menu</a>
            </div>
            <div class="stockRefill">
                <a href="http://localhost/myFolder/stockManagement.php" class="optionButton">Stock Management</a>
            </div>
            <div class="totalSales">
                <a href="http://localhost/myFolder/customerDetails.php" class="optionButton">Customer Management</a>
            </div>
            
        </div>
</div>
<footer class="copyright">
    <h1 class="cpyrght">Developed by Akhin Abraham, Avlin Antony & Nandana S</h1>
</footer>
<?php
    }
    mysqli_close($conn);
?>
</body>
</html>