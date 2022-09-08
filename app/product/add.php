<?php
    include '../partials/header.php';
?>

<h1>Add new product</h1>

<div class="container">
  <form onsubmit = "validateProductForm()" method="post" action="">
    <div>
      <input id="fileInput" type="file" onchange="previewFile()"><br>
      <img id="image" src="" alt="Image preview">
    </div>
    
    <label for="name" value>Name</label> 
    <input id="name" name="name" type="text"><br>
    <label for="price">Price</label>
    <input id="price" name="price" type="number" step=0.1><br>
    <label for="description" value>Description</label> 
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
    <input type="submit" name="add_product" class="bg-red btn">
  </form>
</div>

<script>
  function previewFile() {
    const preview = document.querySelector('#image');
    const file = document.querySelector('#fileInput').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", () => {
      // convert image file to base64 string
      preview.src = reader.result;
      sessionStorage.setItem("temp_add_product_image", reader.result);
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>

<?php
  if (isset($_POST['add_product'])) {
    $product_image=$_POST["image"];
    $product_name=$_POST["name"];
    $product_price=$_POST["price"];
    $product_description=$_POST["description"];

    echo $product_image;
    echo $product_name;
    echo $product_price;
  }

  
?>
