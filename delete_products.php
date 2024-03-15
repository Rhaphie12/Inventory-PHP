<?php
require('config/connection.php');

if (isset($_GET['deleteID'])) {
    $ID = $_GET['deleteID'];
    $query = "DELETE FROM `products` WHERE product_ID = $ID";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // header('Location: firstyear.php');
        echo '
            <script>
                confirm("Deleted Successfully ");
                window.location.href="./mainForm.php";
            </script>
        ';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}
