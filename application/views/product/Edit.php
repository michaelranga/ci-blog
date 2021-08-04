<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Edit Product</title>
  <!-- load bootstrap css file -->
  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CI Warm Up</a>
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
      <center>Edit Product</center>
    </h1>
    <div class="col-md-6 offset-md-3">
      <a href="<?php echo base_url('product'); ?>" style="text-align:right;float:right;">Back</a>
      </br>
      <form action="<?php echo site_url('product/update'); ?>" method="post">
        <div class="form-group">
          <div class="p-0 mb-1 bg-danger text-white" style="font-size:12px;"><?= $this->session->flashdata("message"); ?></div>
        </div>
        <div class="form-group">
          <label>Product Name</label>
          <?php //NEVER use <?= ALWAYS use <?php echo - that shorthand code is limited to the server, not to PHP so can fail
          // <input type="text" class="form-control" name="product_name" value="<?= $product_name; ?>" placeholder="Product Name">
          <!-- the point of using the form_validation library, is so you can clean your data, and display the previous settings if it failed -->
          <input type="text" class="form-control" name="product_name" value="<?php echo set_value('product_name', $product->name) ?>" placeholder="Product Name">
        </div>
        <label>Price</label>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text">$AUD</div>
          </div>
          <input type="text" class="form-control" name="product_price" value="<?= $product_price; ?>" placeholder="Price">
        </div>
        <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
        <div class="form-group">
          <label></label>
          <button type="submit" class="form-control btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>

  <!-- load jquery js file -->
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <!-- load bootstrap js file -->
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>