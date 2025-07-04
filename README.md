<p align="center">
  <a href="https://github.com/Ryandra-TI01/RPL-WEB" target="_blank">
    <img src="https://github.com/RPL-WEB/Aplikasi-HealthTrack/blob/main/public/admin/assets/img/logo-rpl.jpeg?raw=true" alt="Logo AnakSehat">
  </a>
</p>


---

# 👶 AnakSehat

**AnakSehat** adalah Aplikasi ini bertujuan untuk memberikan solusi digital bagi orang tua dan ibu muda dalam meningkatkan kesadaran terhadap kesehatan dan tumbuh kembang anak melalui informasi, edukasi, serta dukungan dalam satu platform.
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
git clone https://github.com/username/RPL-WEB.git
cd RPL-WEB

composer install
cp .env.example .env
php artisan key:generate

# Sesuaikan koneksi database di file .env
php artisan migrate --seed

composer run dev
