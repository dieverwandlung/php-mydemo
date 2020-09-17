<?php 
    session_start();
    require("component.php");
    require("./crud/crud.php");

    if(isset($_POST['addProduct'])){
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "product_id");

            if(in_array($_POST['product_id'], $item_array_id)){
               echo "<p class='alert alert-info'>Bạn đã thêm sản phẩm này vào giỏ! Hãy kiểm tra giỏ hàng</p>";
            }else{
    
                $count = count($_SESSION['cart']);

                $item_array = array(
                    'product_id' => $_POST['product_id']
                );
    
                $_SESSION['cart'][$count] = $item_array;
                echo "<p class='alert alert-success'>Thêm sản phẩm thành công</p>";
            }
        }else{
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][0] = $item_array;

            echo "<p class='alert alert-success'>Thêm sản phẩm thành công</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini PHP Project | Homepage</title>
    <script src="https://kit.fontawesome.com/cc26c499b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">    
</head>
<body>
    <?php navigationBar("text-warning","",""); ?>
    <div id="mainSection" class="container bg-light my-3">
        <h3 class="text-center title">Các sản phẩm đang có:</h3>
        <hr/>
        <div class="row my-3">
            <?php 
                $products = getAllProducts();

                while($item = mysqli_fetch_assoc($products)){
                    shopItem($item['product_image'], $item['product_name'], $item['product_price'], $item['id']);
                }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>