# Real-Time Collaborative Document Editor

Aplikasi editor dokumen kolaboratif real-time yang dibangun menggunakan Laravel.  
Aplikasi ini memungkinkan beberapa pengguna untuk membuat, mengedit, dan berkolaborasi pada dokumen secara bersamaan dengan pembaruan langsung (real-time) dan riwayat revisi.

---

## 🚀 Fitur

- Sistem autentikasi pengguna
- Membuat dan mengelola dokumen
- Editing dokumen secara real-time
- Auto-save perubahan
- Riwayat revisi dokumen
- Sistem kepemilikan dokumen
- Akses kontrol menggunakan middleware

---

## 🛠️ Teknologi yang Digunakan

- Backend: :contentReference[oaicite:0]{index=0}  
- Database: MySQL  
- Frontend: Blade / Vite  
- Real-time: Laravel Reverb / WebSockets (opsional sesuai implementasi)  
- Authentication: Laravel Breeze / Sanctum (opsional)

---

## 📦 Instalasi

### 1. Clone repository
```bash
git clone https://github.com/username/Real-Time-Collaborative-Document-Editor.git
cd Real-Time-Collaborative-Document-Editor

2. Install dependency
composer install
npm install
