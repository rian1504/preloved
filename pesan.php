<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];

    if ($pesan === 'berhasil_daftar') {
        $notifikasi = "Swal.fire({
            title: 'Daftar berhasil!',
            text: 'Akun berhasil dibuat.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_login') {
        $notifikasi = "Swal.fire({
            title: 'Login berhasil!',
            text: 'Berhasil masuk ke Beranda.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_daftar') {
        $notifikasi = "Swal.fire({
            title: 'Daftar gagal!',
            text: 'Akun gagal dibuat.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_username') {
        $notifikasi = "Swal.fire({
            title: 'Daftar gagal!',
            text: 'Username sudah ada.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_email') {
        $notifikasi = "Swal.fire({
            title: 'Daftar gagal!',
            text: 'Email gagal dibuat.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_konfirmasi') {
        $notifikasi = "Swal.fire({
            title: 'Daftar gagal!',
            text: 'Konfirmasi password tidak sesuai.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_peran') {
        $notifikasi = "Swal.fire({
            title: 'Login gagal!',
            text: 'Peran tidak ada.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_password') {
        $notifikasi = "Swal.fire({
            title: 'Login gagal!',
            text: 'Password salah.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_pengguna') {
        $notifikasi = "Swal.fire({
            title: 'Login gagal!',
            text: 'Pengguna tidak ada.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_keranjang') {
        $notifikasi = "Swal.fire({
            title: 'Tambah keranjang gagal!',
            text: 'Pakaian sudah ada di keranjang.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_keranjang') {
        $notifikasi = "Swal.fire({
            title: 'Tambah keranjang berhasil!',
            text: 'Pakaian berhasil ditambahkan ke keranjang.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_bayar') {
        $notifikasi = "Swal.fire({
            title: 'Pembayaran berhasil!',
            text: 'Pakaian berhasil dibayar.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_hapus_keranjang') {
        $notifikasi = "Swal.fire({
            title: 'Hapus berhasil!',
            text: 'Pakaian di keranjang berhasil dihapus.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_ceklis_keranjang') {
        $notifikasi = "Swal.fire({
            title: 'Pembayaran gagal!',
            text: 'Pembayaran pakaian gagal.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_bayar') {
        $notifikasi = "Swal.fire({
            title: 'Pembayaran berhasil!',
            text: 'Pembayaran pakaian berhasil.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'logout') {
        $notifikasi = "Swal.fire({
            title: 'Logout berhasil!',
            text: 'Logout berhasil.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_tambah_kategori') {
        $notifikasi = "Swal.fire({
            title: 'Tambah berhasil!',
            text: 'Kategori berhasil ditambah.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_edit_kategori') {
        $notifikasi = "Swal.fire({
            title: 'Edit berhasil!',
            text: 'Kategori berhasil diedit.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_hapus_kategori') {
        $notifikasi = "Swal.fire({
            title: 'Hapus berhasil!',
            text: 'Kategori berhasil dihapus.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_tambah_pakaian') {
        $notifikasi = "Swal.fire({
            title: 'Tambah berhasil!',
            text: 'Pakaian berhasil ditambah.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_edit_pakaian') {
        $notifikasi = "Swal.fire({
            title: 'Edit berhasil!',
            text: 'Pakaian berhasil diedit.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'berhasil_hapus_pakaian') {
        $notifikasi = "Swal.fire({
            title: 'Hapus berhasil!',
            text: 'Pakaian berhasil dihapus.',
            icon: 'success',
            confirmButtonColor: '#28a745'
        });";
    } elseif ($pesan === 'gagal_search') {
        $notifikasi = "Swal.fire({
            title: 'Pencarian gagal!',
            text: 'Masukkan pencarian.',
            icon: 'error',
            confirmButtonColor: '#28a745'
        });";
    } else {
        $notifikasi = ''; // Atau notifikasi default jika tidak ada kondisi yang sesuai
    }
} else {
    $notifikasi = ''; // Tidak ada parameter pesan pada URL
}
?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php echo $notifikasi; ?>
    });

    document.addEventListener('DOMContentLoaded', function() {
        <?php
        // Ambil status notifikasi dari sesi
        echo isset($_SESSION['notifikasi']) ? $_SESSION['notifikasi'] : '';
        ?>

        // Hapus status notifikasi dari sesi setelah ditampilkan
        <?php unset($_SESSION['notifikasi']); ?>

        // Periksa apakah halaman di-refresh
        if (performance.navigation.type === 1) {
            // Hapus parameter 'pesan' dari URL setelah notifikasi ditampilkan
            if (window.location.search.includes('pesan')) {
                const cleanUrl = window.location.href.split('?')[0];
                history.replaceState({}, document.title, cleanUrl);
            }
        }
    });

    function showConfirmation(event) {
        event.preventDefault(); // Mencegah perilaku default tautan

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda tidak akan dapat mengembalikannya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika konfirmasi diterima, lakukan aksi penghapusan di sini
                // Contoh: window.location.href = "hapus_file.php";

                // Untuk contoh, arahkan ke halaman "hapus.php"
                window.location.href = event.target.href;
            }
        });

        // Mengembalikan false untuk mencegah perilaku default tautan
        return false;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>