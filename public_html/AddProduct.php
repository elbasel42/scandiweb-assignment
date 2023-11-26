<div class="form-container" id="product_form">
    <div>
        <label for="sky">Sku:</label>
        <input type="text" name="sku" id="sku">
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="price">Price: </label>
        <input type="number" name="price" id="price">
    </div>
    <div>
        <label for="Type">Type:</label>
        <select name="type" id="productType">
            <option value="Books">Book</option>
            <option value="Discs">Disc</option>
            <option value="Furniture">Furniture</option>
        </select>
    </div>
    <div id="variable-input"></div>
</div>
<div id="info-div"></div>
<button onclick="add(event)" id="add-button">Save</button>
<a href="./index.php">Cancel</a>
<div id="error"></div>

<script src="/assests/js/add.js" defer></script>
<link rel="stylesheet" href="/assests/css/addProduct.css">