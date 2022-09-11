function encodeImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  return reader.result;
}

const navigateTo = (location) => {
  window.location = location;
};
