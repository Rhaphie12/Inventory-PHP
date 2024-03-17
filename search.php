<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory in PHP</title>
    <link rel="stylesheet" href="./css/styles.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    require('config/connection.php');

    $Product_ID = "";
    $ProductName = "";
    $ProductDescription = "";
    $Quantity =  "";

    if (isset($_POST['updateProduct'])) {
        $Product_ID = $_POST['product_ID'];
        $ProductName = $_POST['product_Name'];
        $ProductDescription = $_POST['product_Description'];
        $Quantity = $_POST['quantity'];

        $insertSQL = "UPDATE products SET product_name ='$ProductName', product_description = '$ProductDescription', quantity ='$Quantity' WHERE product_ID = $Product_ID";

        if ($connection->query($insertSQL) === TRUE) {
            echo '
            <script>
                Swal.fire({
                  text: "Update Product list Successfully!",
                  icon: "success"
                });
            </script>
            ';
        } else {
            echo "Error: " . $insertSQL . "<br>" . $connection->error;
        }
    }

    // SEARCH FUNCTION 
    if (isset($_POST['Search'])) {
        // get values
        $Product_ID = $_POST['product_ID'];

        // new query
        $query = "SELECT * FROM products WHERE product_ID = $Product_ID";

        $search_Result = mysqli_query($connection, $query);

        if ($search_Result) {
            if (mysqli_num_rows($search_Result)) {
                while ($row = mysqli_fetch_array($search_Result)) {
                    $Product_ID =  $row["product_ID"];
                    $ProductName = $row["product_name"];
                    $ProductDescription  = $row["product_description"];
                    $Quantity = $row["quantity"];
                }
            } else {
                echo 'No Data For This Id';
            }
        } else {
            echo 'Result Error';
        }
    }
    ?>
    <header class="nav justify-content-center bg-maroon p-3">
        <div class=" card-header">
            <h4 class="fw-bold text-white ">Inventory in PHP</h4>
        </div>
    </header>

    <div class="container">
        <div class="sub-container">

        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header nav justify-content-between">
                <h5 class="mt-2">Products List</h5>
                <!-- Modal trigger button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                    Add Products
                </button>
            </div>

            <form action="./search.php" method="POST" class="p-4">
                <label for="product_ID">Product ID</label>
                <input type="text" name="product_ID" id="product_ID" value="<?php echo $Product_ID; ?>" class="form-control">
                <br>
                <label for="product_Name">Product name</label>
                <input type="text" name="product_Name" id="product_Name" value="<?php echo $ProductName; ?>" class="form-control">
                <br>
                <label for="product_Description">Product description</label>
                <input type="text" name="product_Description" id="product_Description" value="<?php echo $ProductDescription; ?>" class="form-control" required>
                <br>
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" value="<?php echo $Quantity; ?>" class="form-control">

                <input type="submit" value="Update" name="updateProduct" class="btn btn-success mt-4">
                <a href="./mainForm.php" class="btn btn-outline-primary mt-4">Back</a>
            </form>
        </div>

    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>