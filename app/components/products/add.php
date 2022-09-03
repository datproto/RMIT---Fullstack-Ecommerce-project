<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add product</title>
</head>
<body>
<form method="POST">
  <a href="index.php">Back</a>
  <p>
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name">
  </p>
  <p>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.1" min=1>
  </p>
  <p>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" accept="image/png, image/jpeg">
  </p>
  <p>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description">
  </p>
  <input type="submit" name="save" value="Save">
</form>
<?php
  if(isset($_POST['save'])){
    //include our connection
    include 'dbconfig.php';
 
    //insert query
    $sql = "INSERT INTO products (name, price, image, description) VALUES ('".$_POST['name']."', '".$_POST['price']."', '".$_POST['image']."', ('".$_POST['description']."',)";
    $db->exec($sql);
 
    header('location: index.php');
 
  }
?>
</body>
</html>
