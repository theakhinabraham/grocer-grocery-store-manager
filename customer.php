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
    <title>Grocer | Customer Menu</title>
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
            <a href="login.php" class="navButton">Switch to Store Owner</a>
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
               }       
           ?>
            
        </tbody>
                </table>
        </div>


    <div class="customerBox box">
        <h1 class="heading">Shopping Cart</h1>

<?php 
                    if (array_key_exists('buyProduct', $_POST)) {
                        $Pid = $_REQUEST['productID'];
                        $BuyQuantity = $_REQUEST['buyQuantity'];

                        $buy = "UPDATE product SET Pstock = (SELECT Pstock FROM product WHERE Pid = '$Pid') - '$BuyQuantity' WHERE Pid = '$Pid';";


                            if (mysqli_query($conn, $buy)) {
                                echo "<script>alert('Details added successfully')</script>";
                            } else {
                                echo "<script>alert('Error, Try Again!')</script>";
                            }
                            header("Refresh:0");

                    }

                    if (array_key_exists('checkout', $_POST)) {

                        $checkout = "SELECT * FROM product;";

                            if (mysqli_query($conn, $checkout)) {
                                echo "<script>alert('Purchase Complete!')</script>";
                            } else {
                                echo "<script>alert('Error, Try Again!')</script>";
                            }
                            header("Refresh:0");

                    }



?>
        
        <form class="shoppingCart" method="POST">
            <div id="pid">
            <label>Product ID</label>
            <input type="number" name="productID">
            </div>
            <div id="quantity">
            <label>Quantity</label>
            <input type="number" name="buyQuantity">
            </div>
            <div id="buttons">
                <button class="nextButton" name="buyProduct" value="buyProduct" type="submit">Add Product</button>
                <button class="submit" name="checkout" value="checkout" type="submit">Checkout</button>
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
