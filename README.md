<p align="center">
  <a href="#" target="_blank" >
    <img src="https://raw.githubusercontent.com/Ryandra-TI01/Aplikasi-AnakSehat/f347f0d02e567a4062a0443eedc589c79de1aa78/public/Logo-AnakSehat.png" alt="Logo AnakSehat" style="border-radius: 50%; width: 150px;">
  </a>
</p>


---

# AnakSehat

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
git clone https://github.com/Ryandra-TI01/Aplikasi-AnakSehat
cd Aplikasi-AnakSehat

composer install
cp .env.example .env
php artisan key:generate

# Sesuaikan koneksi database di file .env
php artisan migrate --seed

composer run dev
