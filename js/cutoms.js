function incrementValue() {
  var value = parseInt(document.getElementById('quantity').value, 10);
  value = isNaN(value) ? 1 : value;
  value++;
  document.getElementById('quantity').value = value;
}

function decrementValue() {
  var value = parseInt(document.getElementById('quantity').value, 10);
  value = isNaN(value) ? 1 : value;
  value < 2 ? (value = 2) : '';
  value--;
  document.getElementById('quantity').value = value;
}
