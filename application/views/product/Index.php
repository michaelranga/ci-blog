<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product List</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url('product'); ?>">CI Warm Up</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url('product'); ?>">Product</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>
            <center>Product List</center>
        </h1>
        <div style="text-align:right;float:right;">
            <a href="<?php echo site_url('product/add'); ?>" class="btn btn-md btn-primary">Add New Product</a>
        </div>
        <table style="text-align:center;" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th width="col">Action</th>
                </tr>
            </thead>
            <?php $count = 0; ?>
            <?php foreach ($product->result() as $row) : ?>
                <?php $count++ ?>
                <tr>
                    <th scope="row"><?= $count; ?></th>
                    <td><?= $row->product_name; ?></td>
                    <td><?= number_format($row->product_price); ?></td>
                    <td>
                        <a href="<?php echo site_url('product/edit/' . $row->product_id); ?>" class="btn btn-sm btn-warning">Update</a>
                        <a href="<?php echo site_url('product/delete/' . $row->product_id); ?>" class="btn btn-sm btn-danger">Delete</a>
                    <td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>