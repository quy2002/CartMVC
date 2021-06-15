<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/ListTable.css"/>
</head>
<body>

<table class="table table-striped table-bordered">
    <thead>
    <th>STT</th>
    <th>Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Into Money</th>
    <th class="thead-button"></th>
    </thead>
    <tbody>
    <?php foreach ($listProduct as $key => $item) {?>
        <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $item["name"] ?></td>
            <td><?php echo $item["quantity"] ?></td>
            <td><?php echo $item["price"] ?></td>
            <td><?php echo $item["price"]*$item["quantity"] ?></td>
            <td class="item-button">
                <button onclick="location.href='?route=removeproductincart&id=<?php echo $item["id"];?>'" type="button" class="btn btn-danger btn-lg">Delete</button>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="3"></td>
        <td>Total money</td>
        <td>
            <?php
            $totalMoney = 0;
            foreach ( $listProduct as $item) {
                $totalMoney += $item["quantity"]*$item["price"];
            }
            echo $totalMoney;
            ?>
        </td>
        <td class="item-button">
            <?php if(count($listProduct) > 0) { ?>
                <button type="button" onclick="location.href='Checkout.php'" class="btn btn-success btn-lg">Check out</button>
            <?php } else { ?>
                <button type="button" onclick="location.href='?route=listcategory'" class="btn btn-primary btn-lg">Tiếp tục mua hàng</button>
            <?php } ?>
        </td>
    </tr>
    </tbody>
</table>
<div class="btn-group-control">
    <button class="btn btn-primary btn-lg" onclick="location.href='?route=listcategory'">Close</button>
</div>
</body>
</html>