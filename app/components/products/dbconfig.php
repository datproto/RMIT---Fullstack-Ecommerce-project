<?php
   $db = new SQLite3('products.db');
   
   $query = "CREATE TABLE IF NOT EXISTS products 
      (name TEXT check(name is null or length(name) >= 10 and length(name) <=20),
      price REAL check(price >= 0),
      image BLOB,
      description STRING check(length(description) <= 500)
      )";
   $db->exec($query);
 
?>
