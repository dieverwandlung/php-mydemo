<?php
    session_start();
    require("component.php");
    require("crud/crud.php");

    if (isset($_POST['removeFromSession'])){
        if ($_GET['action'] == 'remove'){
            foreach ($_SESSION['cart'] as $key => $value){
                if($value["product_id"] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('Đã xóa sản phẩm!')</script>";
                    echo "<script>window.location = 'checkout.php'</script>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini PHP Project | Checkout</title>
    <script src="https://kit.fontawesome.com/cc26c499b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">   
</head>
<body>
    <?php navigationBar("","","text-warning");?>   

    <div class="container my-3">
        <div class="row">
            <div class="col-md-9">
                <table class="table table-bordered my-3">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center bg-warning">Tên sản phẩm</th>
                            <th scope="col" class="text-center bg-warning">Giá sản phẩm</th>
                            <th scope="col" class="text-center bg-warning">Xóa sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totalPrice = 0;

                            if(isset($_SESSION['cart'])){
                                $productId = array_column($_SESSION['cart'], "product_id");

                                $allProducts = getAllProducts();
                                while($product = mysqli_fetch_assoc($allProducts)){
                                    foreach($productId as $id){
                                        if($product['id'] == $id){
                                            productCheckout($product['id'], $product['product_name'], $product['product_price']);
                                            $totalPrice += (int)$product['product_price'];
                                        }
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 float-right">
                <div class="card my-3">
                    <div class="card-header bg-warning text-center">
                        <h5>Tổng giá tiền</h5>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <h5 class="card-text align-self-center">$<?php echo $totalPrice; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>