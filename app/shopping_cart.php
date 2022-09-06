<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Shopping Cart</title>
</head>
<body>
<header>
    <?php
    include 'partials/header.php';
    ?>
</header>


<div class="flex gap-lg">

    <ul>
        <li>item one <button>X</button></li>
        <li>item two <button>X</button></li>
        <li>item three <button>X</button></li>
        ....
    </ul>

</div>
<div>
    <input type="reset" value="Clear cart">
</div>




<footer>
    <?php
    include 'partials/footer.php';
    ?>
</footer>
</body>
</html>