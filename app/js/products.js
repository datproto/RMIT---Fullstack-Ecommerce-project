const navigateToProduct = (id) => {
  document.cookie = "product_id = " + id;
  navigateTo("product.php");
};

function addToCart(uid = 1, prod_id) {
  addLocalStorage("buy_prod", {
      user: uid,
      prod: prod_id
  }, 'array', 'append')
}
