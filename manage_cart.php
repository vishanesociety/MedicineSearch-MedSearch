<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Add_To_Cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_Name'], $myitems)) {
                echo "<script>
                        alert('item already added');
                        window.location.href='result.php';
                    </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Shop_Name' => $_POST['Shop_Name'], 'Quantity' => 1);
                // print_r($_SESSION['cart']);
                echo "<script>
               // alert('item added');
                window.location.href='result.php';
            </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Shop_Name' => $_POST['Shop_Name'], 'Quantity' => 1);
            // print_r($_SESSION['cart']);
            echo "<script>
                       // alert('item added');
                        window.location.href='result.php';
                    </script>";
        }
    }
    if (isset($_POST['Remove_Item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_Name'] == $_POST['Item_Name']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']==array_values($_SESSION['cart']);
                echo "<script>
                    // alert('Item Removed');
                    window.location.href='mycart.php';
                </script>";
            }
        }
    }
}
?>
