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

    if (isset($_POST['addCustomer'])) {
        $Customer = $_POST['name'];
        $Address = $_POST['address'];
        $Contact = $_POST['mobileNumber'];

        $insertSQL = "INSERT INTO customers (Customer_name, Address, Mobile_number) 
        VALUES ('$Customer', '$Address', '$Contact')";

        if ($connection->query($insertSQL) === TRUE) {
            echo '
            <script>
                Swal.fire({
                  text: "Added Customer Successfully!",
                  icon: "success"
                });
            </script>
            ';
        } else {
            echo "Error: " . $insertSQL . "<br>" . $connection->error;
        }
    }

    if (isset($_POST['addProduct'])) {
        $ProductID = $_POST['productID'];
        $ProductName = $_POST['productName'];
        $Quantity = $_POST['quantity'];

        $insertSQL = "INSERT INTO products (product_ID, product_name, quantity) 
        VALUES ('$ProductID', '$ProductName', '$Quantity')";

        if ($connection->query($insertSQL) === TRUE) {
            echo '
            <script>
                Swal.fire({
                  text: "Added Product Successfully!",
                  icon: "success"
                });
            </script>
            ';
        } else {
            echo "Error: " . $insertSQL . "<br>" . $connection->error;
        }
    }
    ?>
    <header class="nav justify-content-center bg-maroon p-3">
        <div class=" card-header">
            <h4 class="fw-bold text-white ">Inventory in PHP</h4>
        </div>
    </header>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active maroon-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                Home
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link maroon-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#customers" type="button" role="tab" aria-controls="profile" aria-selected="false">
                Customers
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link maroon-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="messages" aria-selected="false">
                Products
            </button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active m-3" id="home" role="tabpanel" aria-labelledby="home-tab">
            <!-- ======= Hero Section ======= -->
            <section id="hero" class="d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                            <h1 class="text-dark">Simple Inventory System in HTML & PHP</h1>
                            <h2 class="text-dark">Activity in Systems Integration & Architecture 2</h2>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                            <img src="./undraw_Stock_prices_re_js33.png" class="img-fluid animated" alt="">
                        </div>
                    </div>
                </div>

            </section><!-- End Hero -->
        </div>
        <!-- CUSTOMERS LIST -->
        <div class="tab-pane m-3" id="customers" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header nav justify-content-between">
                        <h5 class="mt-2">Customers List</h5>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                            Add Customers
                        </button>

                        <!-- Modal Form for Updating customers  -->
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Add Customers
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./mainForm.php" method="post">
                                            <label for="name">Customer name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>

                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" required>

                                            <label for="mobileNumber">Mobile Number</label>
                                            <input type="text" name="mobileNumber" id="mobileNumber" class="form-control" required>

                                            <input type="submit" value="Add Customer" name="addCustomer" class="btn btn-primary mt-2">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            const myModal = new bootstrap.Modal(
                                document.getElementById("modalId"),
                                options,
                            );
                        </script>
                        <!-- End of Modal -->
                    </div>
                    <!-- Start of table -->
                    <?php
                    require_once('config/connection.php');

                    $query = "SELECT * FROM customers";
                    $result = mysqli_query($connection, $query);
                    ?>
                    <div class="container mt-2">
                        <table class="table text-center table-bordered ">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile No.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "
                                        <tr>
                                            <td>" . $row["ID"] . "</td>
                                            <td>" . $row["Customer_name"] . "</td>
                                            <td>" . $row["Address"] . "</td>
                                            <td>" . $row["Mobile_number"] . "</td>
                                            <td>
                                                <a href='' class='btn btn-success'>Update</a>
                                               <a href='./delete.php?deleteID=" . $row["ID"] . "'class='btn btn-danger'>Delete</a>
                                            </td>
                                        </tr>
                                        ";
                                    }
                                } else {
                                    echo "
                                        <tr>
                                            <td colspan='5'>No results found</td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End of table -->
                </div>
            </div>
        </div>

        <!-- PRODUCTS LIST -->
        <div class="tab-pane m-3" id="products" role="tabpanel" aria-labelledby="messages-tab">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header nav justify-content-between">
                        <h5 class="mt-2">Products List</h5>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId1">
                            Add Products
                        </button>

                        <!-- Modal Form for Updating products  -->
                        <div class="modal fade" id="modalId1" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Add Products
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./mainForm.php" method="post">
                                            <label for="productID">Product ID</label>
                                            <input type="text" name="productID" id="productID" class="form-control" required>

                                            <label for="productName">Product name</label>
                                            <input type="text" name="productName" id="productName" class="form-control" required>

                                            <label for="quantity">Quantity</label>
                                            <input type="text" name="quantity" id="quantity" class="form-control" required>

                                            <input type="submit" value="Add Product" name="addProduct" class="btn btn-primary mt-2">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Optional: Place to the bottom of scripts -->
                        <script>
                            const myModal1 = new bootstrap.Modal(
                                document.getElementById("modalId1"),
                                options,
                            );
                        </script>
                        <!-- End of modal -->
                    </div>
                    <!-- Start of table -->
                    <?php
                    require_once('config/connection.php');

                    $query = "SELECT * FROM products";
                    $results = mysqli_query($connection, $query);
                    ?>
                    <div class="container mt-2">
                        <table class="table text-center table-bordered ">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>Product quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($results->num_rows > 0) {
                                    while ($row = $results->fetch_assoc()) {
                                        echo "
                                        <tr>
                                            <td>" . $row["product_ID"] . "</td>
                                            <td>" . $row["product_name"] . "</td>
                                            <td>" . $row["quantity"] . "</td>
                                            <td>
                                                <a href='' class='btn btn-success'>Update</a>
                                               <a href='./delete_products.php?deleteID=" . $row["product_ID"] . "'class='btn btn-danger'>Delete</a>
                                            </td>
                                        </tr>
                                        ";
                                    }
                                } else {
                                    echo "
                                        <tr>
                                            <td colspan='5'>No results found</td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End of table -->
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>