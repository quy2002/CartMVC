<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/ListTable.css">
</head>
<body>
<h1 class="text-primary">Table category</h1>
<div class="btn-add-new">
    <button onclick="location.href='?route=addnewproduct&id=<?php echo $id ?>'" class="btn btn-success btn-lg">Add new product</button>
</div>

<table class="table table-striped table-bordered">
    <thead>
    <th>STT</th>
    <th>Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th class="thead-button"></th>
    </thead>
    <tbody>
    <?php foreach ($listProduct as $key => $item) {?>
        <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $item["name"] ?></td>
            <td>
                <?php
                if($item["quantity"] > 0) {
                    echo $item["quantity"];
                } else { ?>
                    <button class="btn btn-warning">Sản phẩm đã hết hàng</button>
                <?php } ?>

            </td>
            <td><?php echo $item["price"] ?></td>
            <td class="item-button">
                <button onclick="location.href='?route=editproduct&id=<?php echo $item["id"];?>'" type="button" class="btn btn-primary btn-lg">Edit</button>
                <?php
                if($item["quantity"] > 0) { ?>
                    <button onclick="location.href='?route=addtocart&id=<?php echo $item["id"];?>'" type="button" class="btn btn-success btn-lg">Add to cart</button>
                <?php } else { ?>
                    <button class="btn btn-danger btn-lg">Hết hàng</button>
                <?php } ?>

            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="btn-add-new">
    <button onclick="location.href='?route=listcategory'" class="btn btn-default btn-lg">Close</button>
</div>
</body>
</html>