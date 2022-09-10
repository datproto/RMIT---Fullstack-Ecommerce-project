<?php
include 'partials/header.php';
?>

<div class="flex gap-lg">

    <div class="font-bold">
        <p>Add new product</p>
    </div>
</div>

<div class="flex gap-lg">
    <div>
        <form id="add_products" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input name="token" type="hidden" value="<?php echo $form_token; ?>">
            <label for="image_input">Choose a picture for your product: </label><br>
            <input id="image_input" name="image_input" type="file" accept="image/png, image/jpeg" onchange="previewFile()" required><br>
            <img id="image" src="" alt="" style="width: 250px; height: 250px; display:none"><br>
            <label for="product_name">Name </label><br>
            <input type="text" id="product_name" name="product_name" required class="form-control"><br>
            <label for="product_price">Price </label><br>
            <input type="number" step="0.1" min="0" id="product_price" name="product_price" required><br>
            <label for="product_desc"> Description (Optional) </label><br>
            <input type="text" id="product_desc" name="product_desc"><br><br>
            <input type="submit" value="Add" name="add_product">
        </form>
    </div>

</div>

<script>
    function previewFile() {
        const preview = document.querySelector('#image');
        const file = document.querySelector('#image_input').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", () => {
            preview.style.display = "";
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

<?php
$myfile = fopen("db/lazada.db", "a");
$can_write = true;

function check_product($name)
{
    $file = fopen("db/lazada.db", "r");
    $new = array();
    while (($data = fgetcsv($file)) !== FALSE) {
        array_push($new, $data[1]);
    }
    if (in_array($name, $new)) {
        return false;
    }
    return true;
}

if (isset($_POST['add_product'])) {
    $file = $_FILES["image_input"]["tmp_name"];
    $image_file_path = "product_images/" . $_FILES["image_input"]["name"];
    $name = $_POST["product_name"];
    $price = $_POST["product_price"];
    $description = $_POST["product_desc"];

    if (check_product($name) && $can_write) {
        $list = array(
            array(count($products_array), $name, $name, $image_file_path, $description, $price, $username)
        );
        foreach ($list as $char) {
            fputcsv($myfile, $char);
        }
        move_uploaded_file($file, $image_file_path);

        $put_csv = fputcsv($myfile, $char);
        if ($put_csv) {
            $can_write = false;
        }
    }
}

?>

<?php
include 'partials/footer.php';
?>
