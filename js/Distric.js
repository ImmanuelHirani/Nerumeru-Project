const provinceSelect = document.getElementById('exampleInputProvince');
const citySelect = document.getElementById('exampleInputCity');

// Buat objek yang berisi data kota berdasarkan provinsi
const cities = {
  Aceh: ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Meulaboh', 'Sabang'],
  Bali: ['Denpasar', 'Badung', 'Gianyar', 'Tabanan', 'Bangli'],
  // tambahkan data kota untuk setiap provinsi
};

// Fungsi untuk membuat opsi kota berdasarkan provinsi yang dipilih
function populateCities() {
  const province = provinceSelect.value;
  citySelect.innerHTML = "<option value=''>Pilih Kota</option>";
  if (province && cities[province]) {
    citySelect.disabled = false;
    cities[province].forEach(function (city) {
      const option = document.createElement('option');
      option.value = city;
      option.text = city;
      citySelect.appendChild(option);
    });
  } else {
    citySelect.disabled = true;
  }
}

// Panggil fungsi populateCities setiap kali provinsi dipilih berubah
provinceSelect.addEventListener('change', populateCities);
