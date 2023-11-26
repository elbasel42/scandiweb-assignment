<?php

require_once('Views/ProductList.php');

use Views\ProductList;

$productList = new ProductList();
?>
<nav class="navbar">
    <a href="/AddProduct.php">ADD</a>
    <button onclick="massDelete()">MASS DELETE</button>
</nav>
<div class="products-container">
    <?php $productList->index(); ?>
</div>