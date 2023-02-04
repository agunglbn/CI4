// const swal = $('.swalalert').data('swal');

//         if(swal){
//             Swal.fire(
//                 {
//                     position: 'center',
//                     type: 'success',
//                     title: 'Data Berhasil',
//                     showConfirmButton: true,
//                     icon :'success',
//                     text : swal,
//                     timer: 1800
//                 }
//             )
//         }

CKEDITOR.replace('editor1');


/* Dengan Rupiah */
var dengan_rupiah = document.getElementById('jumlah_pemasukan');
dengan_rupiah.addEventListener('keyup', function(e)
{
    dengan_rupiah.value = formatRupiah(this.value, ' ');
});

/* Fungsi */
function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}
/* Tanpa Rupiah */
