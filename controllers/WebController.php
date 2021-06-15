<?php
include_once "Database.php";
session_start();
class WebController{
    public function ListCategory() {
        $txt_sql = "select * from listcategory";
        $listCategory = [];
        $listCategory = queryDB($txt_sql);
        include "views/ListCategory.php";
    }

    public function ListProduct() {
        $id = $_GET["id"];
        $txt_sql = "select * from listproduct where categoryId = $id";
        $listProduct = [];
        $listProduct = queryDB($txt_sql);
        include "views/ListProduct.php";
    }

    public function AddNewCategory() {
        require_once "views/AddNewCategory.php";

    }

    public function SaveNewCategory() {
        $name = $_POST["name"];
        $txt_sql = "insert into listcategory(name) values('$name')";
        queryDB($txt_sql);
        header("Location: ?route=listcategory");

    }

    public function EditCategory() {
        $categoryId = $_GET["id"];
        $txt_sql = "select * from listcategory where id = $categoryId";
        $listCategory = queryDB($txt_sql);
        $category = $listCategory[0];
        include  "views/EditCategory.php";
    }

    public function SaveEditCategory() {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $txt_sql = "update listcategory set name = '$name' where id = $id";
        updateDB($txt_sql);
        header("Location: ?route=listcategory");

    }

    public function AddNewProduct() {
        $categoryId = $_GET["id"];
        include "views/AddNewProduct.php";
    }

    public function SaveNewProduct() {
        $name = $_POST["name"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $categoryId = $_POST["categoryid"];
        $txt_sql = "insert into listproduct(name, quantity, price, categoryid) values('$name',$quantity,$price, $categoryId)";
        queryDB($txt_sql);
        header("Location: ?route=listproduct&id=$categoryId");

    }

    public function EditProduct() {
        $id = $_GET["id"];
        $txt_sql = "select * from listproduct where id = $id";
        $products = queryDB($txt_sql);
        $product = $products[0];
        include "views/EditProduct.php";
    }

    public function SaveEditProduct() {
        $id = $_POST["id"];
        $categoryId = $_POST["categoryId"];
        $name = $_POST["name"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $txt_sql = "update listproduct set name='$name', quantity=$quantity, price=$price where id = $id ";
        updateDB($txt_sql);
        header("Location: ?route=listproduct&id=$categoryId");
    }

    public function AddToCart() {
        $id = $_GET["id"];
        $txt_sql = "select * from listproduct where id = $id";
        $products = queryDB($txt_sql);
        $product = $products[0];
        include "views/AddToCart.php";
    }

    public function ConfirmAddToCart() {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $quantity = (int)$_POST["quantity"];
        $price = (float)$_POST["price"];
        $categortId = $_POST["categoryId"];
        $product = [
            "id" => $id,
            "name" => $name,
            "quantity" => $quantity,
            "price" => $price,
            "categoryId" => $categortId
        ];
        $listProductInCart = [];
        if($_SESSION["cart"]) {
            $listProductInCart = $_SESSION["cart"];
        }
        if(count($listProductInCart) === 0) {
            $listProductInCart[] = $product;
        } else if(count($listProductInCart) > 0) {
            $checkUniqueProduct = false;
            foreach ($listProductInCart as $key => $item) {
                if($item["id"] === $product["id"]) {
                    $item["quantity"] += $product["quantity"];
                    $listProductInCart[$key] = $item;
                    $checkUniqueProduct = true;
                }
            }
            if($checkUniqueProduct === false) {
                $listProductInCart[] = $product;
            }
        }
        $_SESSION["cart"] = $listProductInCart;
        $productsCurrent = [];
        $txt_sql = "select * from listproduct where id = $id";
        $productsCurrent = queryDB($txt_sql);
        $productCurrent = $productsCurrent[0];
        $productCurrent["quantity"] -= $product["quantity"];
        $quantityProductCurrent = $productCurrent["quantity"];
        $txt_sql2 = "update listproduct set quantity = $quantityProductCurrent where id = $id";
        updateDB($txt_sql2);
        header("Location: ?route=cart");

    }

    public function Cart() {
        $listProduct = [];
        if($_SESSION["cart"]) {
            $listProduct = $_SESSION["cart"];
        }
        include "views/Cart.php";
    }

    public function RemoveProductInCart() {
        $id = $_GET["id"];
        $listProduct = [];
        if($_SESSION["cart"]) {
            $listProduct = $_SESSION["cart"];
            foreach($listProduct as $key => $value) {
                if($id === $value["id"]) {
                    unset($listProduct[$key]);
                }
            }
        }
        $_SESSION["cart"] = $listProduct;
        header("Location: ?route=cart");
    }



}