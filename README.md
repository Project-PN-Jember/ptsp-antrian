# ptsp-antrian

Landing Pages &amp; System Antrian PTSP

### Penggunaan Function Notification

```php
// Aktifkan dulu Log Helpernya
$this->load->helper('notification');

// semuanya hukumnnya wajib diisi
helper_notification('Judul Notifikasi', 'Tanggal Notifikasi akan muncul', 'link notifikasi (redirect)', 'id dari user');

// Contoh:
helper_notification('Sidang Pak Jono', '2022-05-23 08:10:00', 'admin/permohonan', '1');
```
