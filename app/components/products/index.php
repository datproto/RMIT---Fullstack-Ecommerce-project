<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>View my Products</title>
</head>
<body>
<a href="add.php">Add</a>
<table border="1">
  <thead>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Image</th>
    <th>Description</th>
  </thead>
  <tbody>
    <?php
      include 'dbconfig.php';
 
      $sql = "SELECT rowid, * FROM products";
      $query = $db->query($sql);
 
      while($row = $query->fetchArray()){
        echo "
          <tr>
            <td>".$row['rowid']."</td>
            <td>".$row['name']."</td>
            <td>".$row['price']."</td>
            <td>".$row['image']."</td>
            <td>".$row['description']."</td>
            <td>
              <a href='edit.php?id=".$row['rowid']."'>Edit</a>
              <a href='delete.php?id=".$row['rowid']."'>Delete</a>
            </td>
          </tr>
        ";
      }
    ?>
  </tbody>
</table>
</body>
</html>