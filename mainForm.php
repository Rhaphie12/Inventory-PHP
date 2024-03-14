<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header class="nav justify-content-center bg-primary p-3">
        <div class=" card-header">
            <h4 class="fw-bold text-white">Inventory in PHP</h4>
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
        <li class="nav-item" role="presentation">
            <button class="nav-link maroon-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="messages" aria-selected="false">
                Orders
            </button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active m-3" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header nav justify-content-between">
                        <h5 class="mt-2">Inventory</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane m-3" id="customers" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header nav justify-content-between">
                        <h5 class="mt-2">Customers List</h5>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                            Add Customers
                        </button>

                        <!--  -->
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
                                        Hello World
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Optional: Place to the bottom of scripts -->
                        <script>
                            const myModal = new bootstrap.Modal(
                                document.getElementById("modalId"),
                                options,
                            );
                        </script>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane m-3" id="products" role="tabpanel" aria-labelledby="messages-tab">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header nav justify-content-between">
                        <h5 class="mt-2">Products List</h5>
                        <button class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane m-3" id="orders" role="tabpanel" aria-labelledby="messages-tab">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header nav justify-content-between">
                        <h5 class="mt-2">Manage Orders</h5>
                        <button class="btn btn-primary">Add Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>


<html lang="en">

<head>

</head>

<body>

</body>

</html>