# Task Management System

Sebuah aplikasi **Task Management System** berbasis Laravel yang dirancang untuk membantu pengguna mengelola tugas dengan fitur lengkap seperti CRUD, sorting, filtering, dan autentikasi pengguna.

---

## **Fitur Utama**
1. **Task Management CRUD**  
   - Tambah, baca, edit, dan hapus tugas dengan mudah.
   
2. **Sorting Task**  
   - Mengurutkan tugas berdasarkan kolom tertentu, seperti `deadline` atau `created_at`.

3. **Filter Task**  
   - Memfilter tugas berdasarkan status, seperti `completed`, `pending`, atau kategori lainnya.

4. **User Authentication**  
   - Sistem autentikasi yang aman menggunakan Laravel Breeze untuk registrasi, login, dan pengelolaan pengguna.

---

## **Teknologi yang Digunakan**
- **Laravel 11**  
  Framework PHP modern dan efisien.
  
- **MySQL**  
  Database relasional untuk menyimpan data pengguna dan tugas.
  
- **Bootstrap 5**  
  Library front-end untuk tampilan yang responsif dan modern.
  
- **Laravel Breeze**  
  Package autentikasi bawaan Laravel yang ringan dan mudah digunakan.

---

## Cara setup projek agar bisa dijalankan
- Pastikan sudah menginstal composer 
- Download projek ini sebagai zip / clone 
- Ekstrak file projek
- Ubah nama file .env.example menjadi .env
- Pada .env, ubah settingan nya sesuai dengan apa yang akan digunakan (seperti db_name, username, host, password dsb.)
- Jalankan "php artisan migrate" untuk migrasi database nya.
- Jika sudah, projek sudah dapat dijalankan dengan mengetikan artisan command "php artisan serve".
