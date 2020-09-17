<?php 
    require("component.php");
    require("./crud/crud.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini PHP Project | Product Management</title>
    <script src="https://kit.fontawesome.com/cc26c499b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php navigationBar("","text-warning",""); ?>
    <div id="mainSection" class="container bg-light my-3">
        <div class="crudSection">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-center">   
                    <a class="btn btn-success" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-plus"></i> Create
                    </a>
                    <button class="btn btn-primary ml-2" href="" type="submit" role="button" name="readBtn">
                        <i class="fas fa-book-open"></i> Read
                    </button>
                </div> 
                <div class="collapse my-3" id="collapse1">
                    <div class="card card-body">
                        <div id="inputProductName">
                            <p>Tên sản phẩm: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="text" class="form-control" name="productName" value="">
                            </div>
                        </div>
                        <div id="inputProductPrice">
                            <p class="mt-2">Giá sản phẩm: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="text" class="form-control" name="productPrice" value="">
                            </div>
                        </div>
                        <div id="inputProductImage">
                            <p class="mt-2">Hình ảnh sản phẩm: </p>
                            <input type="file" name="productImage" id="fileToUpload">
                        </div>
                        <button type="submit" class="btn btn-success form-control mt-3" name="createBtn"><h5>Tạo mới</h5></button>
                    </div>
                </div>
                <div class="collapse my-3" id="collapse2">
                    <div class="card card-body">
                        <div id="inputProductId">
                            <p>ID: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-portrait"></i></span>
                                </div>
                                <input type="text" class="form-control inputProductId" name="productIdEdit" readonly>
                            </div>
                        </div>
                        <div id="inputProductName">
                            <p class="mt-2">Tên sản phẩm: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
                                </div>
                                <input type="text" class="form-control inputProductName" name="productNameEdit">
                            </div>
                        </div>
                        <div id="inputProductPrice">
                            <p class="mt-2">Giá sản phẩm: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="text" class="form-control inputProductPrice" name="productPriceEdit">
                            </div>
                        </div>
                        <div id="inputProductImage">
                            <p class="mt-2">Hình ảnh sản phẩm: </p>
                            <input type="file" name="productImageEdit" id="fileToUpload">
                        </div>
                        <input type="hidden" class="oldImageName" name="oldSrc" value="">
                        <button type="submit" class="btn btn-warning form-control mt-3" name="updateBtn" ><h5>Cập nhật</h5></button>
                    </div>
                </div>
                <div class="collapse my-3" id="collapse3">
                    <div class="card card-body">
                        <div id="inputProductId">
                            <p>ID: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-portrait"></i></span>
                                </div>
                                <input type="text" class="form-control deleteProductId" name="productIdDelete" readonly>
                            </div>
                        </div>
                        <div id="inputProductName">
                            <p class="mt-2">Tên sản phẩm: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
                                </div>
                                <input type="text" class="form-control deleteProductName" readonly>
                            </div>
                        </div>
                        <div id="inputProductPrice">
                            <p class="mt-2">Giá sản phẩm: </p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="text" class="form-control deleteProductPrice" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger form-control mt-3" name="deleteBtn" ><h5>Xóa</h5></button>
                    </div>
                </div>
                <input type="hidden" value="" class="deleleProduct" name="deleteProductId">
            </form>
        </div>
        <table class="table table-primary table-bordered my-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center bg-warning">ID</th>
                    <th scope="col" class="text-center bg-warning">Tên sản phẩm</th>
                    <th scope="col" class="text-center bg-warning">Giá sản phẩm</th>
                    <th scope="col" class="text-center bg-warning">Hình ảnh sản phẩm</th>
                    <th scope="col" class="text-center bg-warning">Update/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_POST['readBtn'])){
                        $products = getAllProducts();
                        if($products){
                            while($item = mysqli_fetch_assoc($products)){
                                tableItem($item['id'], $item['product_name'], $item['product_price'], $item['product_image']);
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>