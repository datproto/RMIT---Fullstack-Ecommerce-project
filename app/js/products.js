function addToCart(uid = 1, prod_id) {
  addLocalStorage("buy_prod", {
      user: uid,
      prod: prod_id
  }, 'array', 'append')
}
