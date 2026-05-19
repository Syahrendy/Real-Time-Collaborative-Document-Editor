# Real-Time Collaborative Document Editor

A real-time collaborative document editor built with Laravel.  
This application allows multiple users to create, edit, and collaborate on documents simultaneously with live updates and revision tracking.

---

## 🚀 Features

- User authentication system
- Create and manage documents
- Real-time collaborative editing
- Auto-save changes
- Revision history tracking
- Document ownership system
- Secure access control (auth middleware)

---

## 🛠️ Tech Stack

- Backend: Laravel
- Database: MySQL
- Frontend: Blade / Vite
- Real-time: Laravel Reverb / WebSockets (if used)
- Authentication: Laravel Breeze / Sanctum (optional)

---

## 📦 Installation

### 1. Clone repository
```bash
git clone https://github.com/your-username/Real-Time-Collaborative-Document-Editor.git
cd Real-Time-Collaborative-Document-Editor

2. Install dependencies
composer install
npm install

3. Setup environment
cp .env.example .env
php artisan key:generate

4. Configure database
Edit .env file:
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=

5. Run migrations
php artisan migrate

6. Run development server
php artisan serve
npm run dev

Sistem Real-Time

Proyek ini menggunakan sistem real-time broadcasting untuk menyinkronkan perubahan dokumen antar pengguna secara langsung.
Saat satu pengguna melakukan edit pada dokumen, perubahan akan langsung dikirim dan ditampilkan ke semua pengguna yang sedang membuka dokumen yang sama.
