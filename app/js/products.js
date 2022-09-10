function addToCart(uname = "not_registered", prod_id) {
  console.log("uname", uname);
  addLocalStorage(
    "buy_prod",
    {
      user: uname,
      prod: prod_id,
    },
    "array",
    "append"
  );
}
