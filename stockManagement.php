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
    <title>Grocer | Stock Manager</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="http://localhost/myFolder/script.js"></script>
</head>
    <body>
    <div class="loaderCustomer hidden" id="loader">
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
            
                <table class="table">
                    <thead>
                    <tr class="tableHead">
                        <th>Product ID</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Remaining Stock (in KG)</th>
                    </tr>
                    </thead>
                    <tbody class="productsTable">
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


    <div class="customerBox box">
        <h1 class="heading">Add Products</h1>

        <?php
                        if (array_key_exists('insert', $_POST)) {
                            $Pid = $_REQUEST['productID'];
                            $Pname = $_REQUEST['productName'];
                            $Pprice = $_REQUEST['productPrice'];
                            $Pstock = $_REQUEST['quantity'];

                            $insert = "INSERT INTO product VALUES ('$Pid', '$Pname', '$Pprice', '$Pstock');";

                            if (mysqli_query($conn, $insert)) {
                                echo "<script>alert('Details added successfully')</script>";
                            } else {
                                echo "<script>alert('Error, Try Again!')</script>";
                            }
                            header("Refresh:0");

                        }
        
                        if (array_key_exists('modify', $_POST)) {
                            $Pid = $_REQUEST['productID'];
                            $Pname = $_REQUEST['productName'];
                            $Pprice = $_REQUEST['productPrice'];
                            $Pstock = $_REQUEST['quantity'];

                            $modify = "UPDATE product SET Pname = '$Pname', Pprice = '$Pprice', Pstock = '$Pstock' WHERE Pid = '$Pid'";

                            if (mysqli_query($conn, $modify)) {
                                echo "<script>alert('Details added successfully')</script>";
                            } else {
                                echo "<script>alert('Error, Try Again!')</script>";
                            }
                            header("Refresh:0");

                        }


                        if (array_key_exists('delete', $_POST)) {
                            $Pid = $_REQUEST['productID'];
                            $Pname = $_REQUEST['productName'];

                            $delete = "DELETE FROM product WHERE Pid = '$Pid' AND Pname = '$Pname'";

                            if (mysqli_query($conn, $delete)) {
                                echo "<script>alert('Details added successfully')</script>";
                            } else {
                                echo "<script>alert('Error, Try Again!')</script>";
                            }
                            header("Refresh:0");

                        }

        ?>


        <form class="shoppingCart" method="POST">
            <div id="buttons">
                <div id="pid">
                    <label>Product ID</label>
                    <input type="number" name="productID">
                </div>
                <div id="pname">
                    <label>Products</label>
                    <input type="text" name="productName">
                </div>
            </div>
            <div id="buttons">
                <div id="pprice">
                    <label>Price</label>
                    <input type="number" name="productPrice">
                </div>
                <div id="quantity">
                    <label>Quantity</label>
                    <input type="number" name="quantity">
                </div>
            </div>
            <div class="buttonSettings">
                <div>
                    <button class="nextButton" value="insert" name="insert" type="submit">New Product</button>
                </div>
                <div>
                    <button class="nextButton" value="modify" name="modify" type="submit">Modify Product</button>
                </div>
                <div>
                    <button class="nextButton" value="delete" name="delete" type="submit">Delete Product</button>
                </div>
            </div>
        </form>
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
