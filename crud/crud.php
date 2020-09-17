<?php
    require_once("./component.php");
    require_once("./createDB.php");

    $con = createDB();

    if(isset($_POST['createBtn'])){
        createNewProduct();
    }

    if(isset($_POST['updateBtn'])){
        updateProduct();
    }

    if(isset($_POST['deleteBtn'])){
        deleteProduct();
    }

    function getAllProducts(){
        $query = "SELECT * FROM Products";

        $products = mysqli_query($GLOBALS['con'], $query);

        if(mysqli_num_rows($products) > 0){
            return $products;
        }
    }

    function getValueFromInput($inputName){
        $valueFromInput = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$inputName]));

        if(empty($valueFromInput)){
            return false;
        }else{
            return $valueFromInput;
        }
    }

    function createNewProduct(){
        $productName = getValueFromInput("productName");
        $productPrice = getValueFromInput("productPrice");
        $validImage = 1;

        $imageName = $_FILES['productImage']['name'];
        $imageSize = $_FILES['productImage']['size'];

        $target_dir = "productImage/";
        $target_file = $target_dir . basename($imageName);

        $imageType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $typesAllow = array("jpg","jpeg","png");

        if((in_array($imageType, $typesAllow)) && $imageSize < 4000000){
            $validImage = 1;
        }else{
            $validImage = 0;
        }

        if($productName != false && $productPrice != false && $validImage == 1){
            $query = "INSERT INTO products(product_name, product_price, product_image)
                    VALUES ('$productName', '$productPrice', '".$imageName."')";

            if(mysqli_query($GLOBALS['con'], $query)){
                echo "<div class='alert alert-success'>Sản phẩm đã tạo thành công</div>";
            }else{
                echo "<div class='alert alert-danger'>Lỗi khi tạo sản phẩm</div>";
            }

            move_uploaded_file($_FILES['productImage']['tmp_name'],$target_dir.$imageName);
        }else{
            echo "<div class='alert alert-danger'>Hãy nhập đúng các thông tin sản phẩm</div>";
        }
    }

    function updateProduct(){
        $productId = getValueFromInput("productIdEdit");
        $productName = getValueFromInput("productNameEdit");
        $productPrice = getValueFromInput("productPriceEdit");
        $productImageOldSrc = getValueFromInput("oldSrc");

        $imageName = $_FILES['productImageEdit']['name'];
        $imageSize = $_FILES['productImageEdit']['size'];

        $target_dir = "productImage/";
        $target_file = $target_dir . basename($imageName);

        $imageType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $typesAllow = array("jpg","jpeg","png");

        if((in_array($imageType, $typesAllow)) && $imageSize < 4000000){
            $validImage = 1;
        }else{
            $validImage = 0;
        }

        if($productName != false && $productPrice != false){
            if($validImage == 1){
                $query = "UPDATE products SET product_name = '$productName', product_price = '$productPrice', product_image = '".$imageName."' WHERE id = '$productId'";

                move_uploaded_file($_FILES['productImageEdit']['tmp_name'], $target_dir.$imageName);
            }else{
                $query = "UPDATE products SET product_name = '$productName', product_price = '$productPrice' WHERE id = '$productId'";
            }
            
            if(mysqli_query($GLOBALS['con'], $query)){
                echo "<div class='alert alert-success'>Sản phẩm đã cập nhật thành công</div>";
            }else{
                echo "<div class='alert alert-danger'>Lỗi khi cập nhật sản phẩm</div>";
            }
        }else{
            echo "<div class='alert alert-danger'>Hãy nhập đầy đủ các thông tin sản phẩm</div>";
        }
    }

    function deleteProduct(){
        $deleteProductId = (int)getValueFromInput("productIdDelete");

        $query = "DELETE FROM products WHERE id = $deleteProductId";

        if(mysqli_query($GLOBALS['con'], $query)){
            echo "<div class='alert alert-success'>Đã xóa sản phẩm thành công</div>";
        }else{
            echo "<div class='alert alert-danger'>Gặp lỗi khi xóa sản phẩm</div>";
        }
    }