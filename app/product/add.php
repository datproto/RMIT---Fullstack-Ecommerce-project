<?php
    include '../partials/header.php';
?>

<h1>Add new product</h1>

<div class="flex container">
  <form onsubmit="handleSubmit(event)" method="post" action="">
    <div class="imageContainer rad-md" >
      <input id="fileInput" type="file" onchange="previewFile()"><br>
      <img id="image" src="" alt="Image preview">
    </div>
    
    <div class="field">
      <label for="name" value>Name</label> 
      <input id="name" name="name" type="text"><br>
    </div>

    <div class="field">
      <label for="price">Price</label>
      <input id="price" name="price" type="number" step=0.1><br>
    </div>

    <div class="field">
      <label for="description" value>Description</label> 
      <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
    </div>

    <input type="submit" name="add_product" class="bg-red btn">
  </form>
</div>

<script>
  const previewFile = () => {
    const preview = document.querySelector('#image');
    const file = document.querySelector('#fileInput').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", () => {
      preview.src = reader.result; // load uploaded image
      sessionStorage.setItem("temp_add_product_image", reader.result);
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }

  const handleSubmit = (event) => {
    if (event) event.preventDefault();

    const productData = {
      image:  sessionStorage.getItem('temp_add_product_image'),
      name:  document.getElementById('name').value,
      price:  document.getElementById('price').value,
      description:  document.getElementById('description').value,
    }
    
    // TODO: figure out a way to store this object into the product.db file.
    console.log ("product data to be saved", productData); 
  }
</script>

