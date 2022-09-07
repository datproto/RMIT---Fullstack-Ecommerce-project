<!doctype html>
<html lang="en-US">
<head>
    <title>Shopping Cart</title>
    <script src="js/shopping_cart.js"></script>
</head>

<body>
<header>
    <?php
    include 'partials/header.php';
    ?>
</header>


<form name="ShoppingList">
    <fieldset>
        <legend>Shopping cart</legend>
        <label>Item: <input type="text" name="name"></label>
        <label>Quantity: <input type="text" name="data"></label>

        <input type="button" value="Save"   onclick="SaveItem()">
        <input type="button" value="Update" onclick="ModifyItem()">
        <input type="button" value="Delete" onclick="RemoveItem()">
    </fieldset>
    <div id="items_table">
        <h2>Shopping List</h2>
        <table id="list"></table>
        <label><input type="button" value="Clear" onclick="ClearAll()">
            * Delete all items</label>
    </div>
</form>





<footer>
    <?php
    include 'partials/footer.php';
    ?>
</footer>
</body>
</html>