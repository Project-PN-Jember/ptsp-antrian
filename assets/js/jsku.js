// const flashData = $('.flash').data('flashdata');

// console.log(flashData);
// if (flashData) {
//     Swal.fire({
//         title: 'Error!',
//         text: 'Do you want to continue' + flashData,
//         icon: 'error',
//         confirmButtonText: 'Cool'
//     })
// }
const pesan = $('.pesan').data('flashdata');

console.log(pesan);
if (pesan) {
    Swal.fire({
        title: 'Selamat!',
        text: 'Data Anda akan diproses, admin akan menghungi Anda kembali',
        icon: 'success',
        confirmButtonText: 'OK'

    })
}

