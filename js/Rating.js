// Mendapatkan elemen ikon bintang
const stars = document.querySelectorAll('.bi-star');

// Tambahkan event listener untuk setiap ikon bintang
stars.forEach((star, index) => {
  star.addEventListener('click', () => {
    // Mengisi bintang dengan ikon yang terisi
    for (let i = 0; i <= index; i++) {
      stars[i].classList.add('bi-star-fill');
      stars[i].classList.remove('bi-star');
    }
    // Mengosongkan bintang dengan ikon yang tidak terisi
    for (let i = index + 1; i < stars.length; i++) {
      stars[i].classList.remove('bi-star-fill');
      stars[i].classList.add('bi-star');
    }
    // Menampilkan pesan 'Terimakasih'
    alert('Terimakasih atas ratingnya \u{1F60A}');
  });
});
