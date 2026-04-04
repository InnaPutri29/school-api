# 📡 Tugas Penyelesaian RESTful APIs (Laravel)

## 👩‍🎓 Identitas Mahasiswa

* **Nama:** Inna Putri Meida
* **NIM:** 23051130027
* **Mata Kuliah:** Praktik API
* **Kelas:** TI-I

---

## 🚀 Deskripsi Project

Project ini merupakan implementasi **RESTful API** menggunakan framework Laravel untuk mengelola sistem akademik sekolah.

API ini dirancang untuk menangani beberapa entitas utama, yaitu:

* 📘 Siswa
* 👨‍🏫 Guru
* 🏫 Kelas
* 📚 Mata Pelajaran
* 📅 Jadwal

Setiap entitas memiliki fitur CRUD (Create, Read, Update, Delete) yang dapat diakses melalui endpoint API.

---

## 🛠️ Teknologi yang Digunakan

* PHP
* Laravel
* MySQL
* Composer
* Postman (untuk testing API)

---

## 📂 Struktur Project (Laravel)

```bash
app/
├── Models/
├── Http/
│   ├── Controllers/
│   └── Requests/
routes/
├── api.php
database/
├── migrations/
├── seeders/
```

---

## ⚙️ Cara Instalasi & Menjalankan Project

### 1. Clone Project

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
```

### 2. Install Dependency

```bash
composer install
```

### 3. Copy File Environment

```bash
cp .env.example .env
```

### 4. Konfigurasi Database

Edit file `.env`:

```env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Generate Key

```bash
php artisan key:generate
```

---

### 6. Migrasi Database

```bash
php artisan migrate
```

---

### 7. Jalankan Server

```bash
php artisan serve
```

Akses API di:

```
http://127.0.0.1:8000/api/
```

---

## 🔌 Contoh Endpoint API

### 📘 Siswa

| Method | Endpoint        | Deskripsi        |
| ------ | --------------- | ---------------- |
| GET    | /api/siswa      | Ambil semua data |
| POST   | /api/siswa      | Tambah data      |
| GET    | /api/siswa/{id} | Detail data      |
| PUT    | /api/siswa/{id} | Update data      |
| DELETE | /api/siswa/{id} | Hapus data       |

---

### 👨‍🏫 Guru

| Method | Endpoint       |
| ------ | -------------- |
| GET    | /api/guru      |
| POST   | /api/guru      |
| PUT    | /api/guru/{id} |
| DELETE | /api/guru/{id} |

---

### 📚 Mata Pelajaran

```
GET    /api/mapel
POST   /api/mapel
PUT    /api/mapel/{id}
DELETE /api/mapel/{id}
```

---

### 🏫 Kelas

```
GET    /api/kelas
POST   /api/kelas
PUT    /api/kelas/{id}
DELETE /api/kelas/{id}
```

---

### 📅 Jadwal

```
GET    /api/jadwal
POST   /api/jadwal
PUT    /api/jadwal/{id}
DELETE /api/jadwal/{id}
```

---

## 🧪 Testing API

Gunakan aplikasi seperti:

* Postman
* Thunder Client (VS Code)

Contoh request:

```json
POST /api/siswa
{
  "nama": "Budi",
  "nis": "12345",
  "kelas_id": 1
}
```

---

## 🎯 Tujuan Pembelajaran

* Memahami konsep RESTful API
* Menggunakan Laravel sebagai backend
* Membuat CRUD API
* Menghubungkan frontend dengan backend

---

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran.

---

## 🙌 Penutup

Project ini diharapkan dapat membantu dalam memahami implementasi RESTful API menggunakan Laravel dalam pengembangan aplikasi berbasis web.

---
