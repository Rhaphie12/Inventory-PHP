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

    $customer_ID = "";
    $Customer = "";
    $Address = "";
    $Contact = "";

    if (isset($_POST['updateCustomers'])) {
        $customer_ID = $_POST['customer_ID'];
        $Customer = $_POST['name'];
        $Address = $_POST['address'];
        $Contact = $_POST['mobileNumber'];

        $insertSQL = "UPDATE customers SET Customer_Name ='$Customer', Customer_address = '$Address', Mobile_number ='$Contact' WHERE customer_ID = $customer_ID";

        if ($connection->query($insertSQL) === TRUE) {
            echo '
            <script>
                Swal.fire({
                  text: "Update Customer list Successfully!",
                  icon: "success"
                });
            </script>
            ';
        } else {
            echo "Error: " . $insertSQL . "<br>" . $connection->error;
        }
    }

    // SEARCH CUSTOMERS
    if (isset($_POST['customers'])) {
        // get values
        $customer_ID = $_POST['customer_ID'];

        // new query
        $query = "SELECT * FROM customers WHERE customer_ID = $customer_ID";

        $search_Result = mysqli_query($connection, $query);

        if ($search_Result) {
            if (mysqli_num_rows($search_Result)) {
                while ($row = mysqli_fetch_array($search_Result)) {
                    $customer_ID =  $row["customer_ID"];
                    $Customer = $row["Customer_name"];
                    $Address  = $row["Customer_address"];
                    $Contact = $row["Mobile_number"];
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

            <form action="./customers.php" method="post" class="p-4">
                <label for="customer_ID">ID</label>
                <input type="text" name="customer_ID" id="customer_ID" value="<?php echo $customer_ID; ?>" class="form-control">
                <br>
                <label for="name">Customer name</label>
                <input type="text" name="name" id="name" value="<?php echo $Customer; ?>" class="form-control">
                <br>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="<?php echo $Address; ?>" class="form-control">
                <br>
                <label for="mobileNumber">Mobile Number</label>
                <input type="text" name="mobileNumber" id="mobileNumber" value="<?php echo $Contact; ?>" class="form-control">

                <input type="submit" value="Update" name="updateCustomers" class="btn btn-success mt-4">
                <a href="./mainForm.php" class="btn btn-outline-primary mt-4">Back</a>
            </form>
        </div>

    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>