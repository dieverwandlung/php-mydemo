<?php
    function navigationBar($active1, $active2, $active3){
        $navBar = "
            <nav class='navbar navbar-expand-lg navbar-dark bg-dark' id='navBarContainer'>
                <div id='navBar'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item'>
                            <a class='nav-link text-light customItem' href='index.php'><h5 class='$active1'>Trang chủ</h5></a>
                        </li>
                        <li class='nav-item ml-5'>
                            <a class='nav-link text-light' href='product.php'><h5 class='$active2'>Quản lý sản phẩm</h5></a>
                        </li>
                        <li class='nav-item ml-5'>
                            <a class='nav-link text-light' href='checkout.php'><h5 class='$active3'>Giỏ hàng</h5></a>
                        </li>
                    </ul>
                </div>
            </nav>
        ";

        echo $navBar;
    };

    function shopItem($productImage,$productName,$productPrice,$productId){
        $item = "
            <div class='col-md-3 col-sm-6 my-3 d-flex align-items-stretch'>
                <form action='index.php' method='POST'>
                    <div class='card'>
                        <img src='./productImage/$productImage' width='200px' height='300px' class='img-fluid card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title text-center'>$productName</h5>
                            <p class='card-text text-center'>Giá bán: $$productPrice</p>       
                            <input type='hidden' name='product_id' value='$productId' />
                        </div>
                        <div class='card-footer align-item-center'>
                            <button type='submit' class='btn btn-warning my-3 form-control' name='addProduct'><i class='fas fa-cart-plus'></i> Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </form>
            </div>
        ";

        echo $item;
    }

    function tableItem($id, $productName, $productPrice ,$productImage){
        $tableItem = "
            <tr>
                <td scope='row' class='text-center'>$id</td>
                <td class='text-center'>$productName</td>
                <td class='text-center'>$$productPrice</td>
                <td class='text-center'><img src='./productImage/$productImage' id='tableImg'/></td>
                <td class='d-flex justify-content-center'>
                    <a class='btn btn-warning editBtn' data-toggle='collapse' href='#collapse2' role='button' aria-expanded='false' aria-controls='collapseExample'>
                        <i class='fas fa-pen'></i> Update
                    </a>
                    <button class='btn btn-danger ml-3 deleteBtn' data-toggle='collapse' href='#collapse3' role='button' aria-expanded='false' aria-controls='collapseExample' role='button' name='deleteBtn'>
                        <i class='fas fa-trash-alt'></i> Delete
                    </button>
                </td>
            </tr>
        ";
        echo $tableItem;
    }

    function productCheckout($id, $productName, $productPrice){
        $item = "
        <form action='checkout.php?action=remove&id=$id' method='POST'>
            <tr>
                <input type='hidden' value='$id' name='productId'>
                <td class='text-center'>$productName</td>
                <td class='text-center'>$$productPrice</td>
                <td class='d-flex justify-content-center'>
                    <button class='btn btn-danger' href='' role='button' role='button' name='removeFromSession'>
                        <i class='fas fa-trash-alt'></i> Delete
                    </button>
                </td>
            </tr>
        </form>
        ";

        echo $item;
    }