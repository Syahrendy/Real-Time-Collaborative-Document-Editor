# Real-Time Collaborative Document Editor

Aplikasi editor dokumen kolaboratif real-time yang dibangun menggunakan :contentReference[oaicite:0]{index=0}.  
Aplikasi ini memungkinkan beberapa pengguna untuk membuat, mengedit, dan berkolaborasi pada dokumen secara bersamaan dengan pembaruan langsung (real-time) serta riwayat revisi.

---

## 🚀 Fitur & Teknologi

Aplikasi ini memiliki fitur utama seperti:
- Sistem autentikasi pengguna  
- Membuat dan mengelola dokumen  
- Editing dokumen secara real-time  
- Auto-save perubahan  
- Riwayat revisi dokumen  
- Sistem kepemilikan dokumen  
- Akses kontrol menggunakan middleware  

Teknologi yang digunakan:
- Backend: Laravel  
- Database: MySQL  
- Frontend: Blade / Vite  
- Real-time: Laravel Reverb / WebSockets  
- Authentication: Laravel Breeze / Sanctum  

---

## 📦 Instalasi

### 1. Clone repository
```bash
git clone https://github.com/username/Real-Time-Collaborative-Document-Editor.git
cd Real-Time-Collaborative-Document-Editor

composer install
npm install

DB_DATABASE=google_docs
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate

php artisan serve
npm run dev
