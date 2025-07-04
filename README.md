<p align="center">
  <a href="https://github.com/Ryandra-TI01/RPL-WEB" target="_blank">
    <img src="https://github.com/Ryandra-TI01/RPL-WEB/blob/main/public/admin/assets/img/logo-rpl.jpeg?raw=true" alt="Logo AnakSehat">
  </a>
</p>


---

# 👶 AnakSehat

**AnakSehat** adalah aplikasi digital yang dirancang untuk membantu orang tua dan ibu muda dalam meningkatkan kesadaran akan kesehatan dan tumbuh kembang anak melalui informasi, edukasi, dan dukungan yang terintegrasi dalam satu platform.
---

## ✨ Fitur Utama

- 🔐 **Autentikasi Pengguna**
- 🩺 **Konsultasi Kesehatan Anak**
- 📚 **Artikel Kesehatan Anak**
- 🗂️ **Manajemen Data**
- 💬 **Respons Konsultasi**
- 📋 **Pencatatan Kesehatan Anak**
- ✅ **Validasi Akun Dokter**
- ✍️ **Pembuatan Artikel**

---

## 🛠️ Teknologi

- **Laravel 11**
- **Laravel Breeze**
- **MySQL**

---

## 🚀 Instalasi

```bash
git clone https://github.com/Ryandra-TI01/RPL-WEB
cd RPL-WEB

composer install
cp .env.example .env
php artisan key:generate

# Sesuaikan koneksi database di file .env
php artisan migrate --seed

composer run dev
