const navigateToProduct = (id) => {
  document.cookie = "product_id = " + id;
  navigateTo(`product/index.php`)
}
