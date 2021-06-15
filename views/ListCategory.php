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
<h1 class="text-primary">List category</h1>
<div class="btn-add-new">
    <button onclick="location.href='?route=addnewcategory'" class="btn btn-success btn-lg">Add new category</button>
    <button onclick="location.href='?route=cart'" class="btn btn-warning btn-lg">My Cart</button>
</div>
<table class="table table-striped table-bordered">
    <thead>
    <th>ID</th>
    <th>Category name</th>
    <th class="thead-button"></th>
    </thead>
    <tbody>
    <?php foreach ($listCategory as $item) {?>
        <tr>
            <td><?php echo $item["id"] ?></td>
            <td><?php echo $item["name"] ?></td>
            <td class="item-button">
                <button onclick="location.href='?route=editcategory&id=<?php echo $item["id"] ?>'" type="button" class="btn btn-primary btn-lg">Edit</button>
                <button onclick="location.href='?route=listproduct&id=<?php echo $item["id"]?>'" type="button" class="btn btn-success btn-lg">View</button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>