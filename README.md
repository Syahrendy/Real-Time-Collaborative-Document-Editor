# Real-Time Collaborative Document Editor

Aplikasi editor dokumen kolaboratif real-time yang dibangun menggunakan :contentReference[oaicite:0]{index=0}.  
Aplikasi ini memungkinkan beberapa pengguna untuk membuat, mengedit, dan berkolaborasi pada dokumen secara bersamaan dengan pembaruan langsung (real-time).

Aplikasi ini memiliki fitur utama seperti:
- Sistem autentikasi pengguna  
- Membuat dan mengelola dokumen  
- Editing dokumen secara real-time  
- Auto-save perubahan    
- Akses kontrol menggunakan middleware  

Teknologi yang digunakan:
- Backend: Laravel  
- Database: MySQL  
- Frontend: Blade / Vite  
- Real-time: Laravel Reverb / WebSockets  
- Authentication: Laravel Breeze / Sanctum  

---

Clone repository:
```bash
git clone https://github.com/username/Real-Time-Collaborative-Document-Editor.git
cd Real-Time-Collaborative-Document-Editor

2. Install dependency:

composer install
npm install

3. Setup environment:

cp .env.example .env
php artisan key:generate

4. Konfigurasi database:

DB_DATABASE=google_docs
DB_USERNAME=root
DB_PASSWORD=

5. Jalankan migration:

php artisan migrate

6. Jalankan server:

php artisan serve
php artisan reverb:start
npm run dev

Sistem real-time menggunakan broadcasting untuk menyinkronkan perubahan dokumen secara langsung antar pengguna. Setiap perubahan akan langsung ditampilkan ke semua user yang membuka dokumen yang sama.

