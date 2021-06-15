<?php
include_once "controllers/WebController.php";
$route = $_GET["route"];
$controller = new WebController();
switch ($route) {
    case "listcategory":
        $controller->ListCategory();
        break;
    case "listproduct":
        $controller->ListProduct();
        break;
    case "addnewcategory":
        $controller->AddNewCategory();
        break;
    case "savenewcategory":
        $controller->SaveNewCategory();
        break;
    case "editcategory":
        $controller->EditCategory();
        break;
    case "saveeditcategory":
        $controller->SaveEditCategory();
        break;
    case "addnewproduct":
        $controller->AddNewProduct();
        break;
    case "savenewproduct":
        $controller->SaveNewProduct();
        break;
    case "editproduct":
        $controller->EditProduct();
        break;
    case "saveeditproduct":
        $controller->SaveEditProduct();
        break;
    case "addtocart":
        $controller->AddToCart();
        break;
    case "confirmaddtocart":
        $controller->ConfirmAddToCart();
        break;
    case "cart":
        $controller->Cart();
        break;
    case "removeproductincart":
        $controller->RemoveProductInCart();
        break;
    default:
        $controller->ListCategory();
        break;
}