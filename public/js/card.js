document.querySelectorAll('.product_container .view-details').forEach(link => {
    link.addEventListener('click', function (event) {
       event.preventDefault();
       let product = this.closest('.product');
       let idLelang = product.getAttribute('data-id-lelang');
 
       getLelangDetails(idLelang);
    });
 });
 
 function getLelangDetails(idLelang) {
    fetch(`/masyarakat/get-lelang-details/${idLelang}`)
       .then(response => response.json())
       .then(data => {
          previewBox.querySelector('.image-block img').src = data.foto_barang;
          previewBox.querySelector('h3').innerText = data.nama_barang;
          previewBox.querySelector('.stars span').innerText = data.tgl;
          previewBox.querySelector('.price').innerText = data.harga_awal;
 
          previewBox.classList.add('active');
          productDetails.style.display = 'flex';
       })
       .catch(error => {
          console.error('Error fetching lelang details:', error);
       });
 }
 