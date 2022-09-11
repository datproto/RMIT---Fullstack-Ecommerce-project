function addToCart(prod_id) {
  addLocalStorage(
    "buy_prod",
    {
      prod: prod_id,
    },
    "array",
    "append"
  );
  let data = {
      'prod': prod_id,
  };
  let url = "shop_addToCart.php";
  let xhr = new XMLHttpRequest();
  xhr.open("POST", url);
  xhr.onreadystatechange = function() { if (xhr.readyState === 4 && xhr.status === 200) { console.log(xhr.responseText); } }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("buy_prod=" + encodeURIComponent(JSON.stringify(data)));
}
