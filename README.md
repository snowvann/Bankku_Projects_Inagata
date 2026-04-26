# Bankku – Financial SaaS Dashboard

### Technical Test Frontend Developer – Inagata

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge\&logo=laravel\&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.0-38B2AC?style=for-the-badge\&logo=tailwind-css\&logoColor=white)
![ApexCharts](https://img.shields.io/badge/ApexCharts-Visual-FEB019?style=for-the-badge\&logo=javascript\&logoColor=white)
![Responsive](https://img.shields.io/badge/Responsive-All_Devices-10B981?style=for-the-badge)
![Architecture](https://img.shields.io/badge/Pattern-Component_Based-blue?style=for-the-badge)

---

## 📌 Overview

Repositori ini berisi implementasi frontend untuk **Bankku**, sebuah dashboard Financial SaaS yang dikembangkan sebagai bagian dari **Technical Test di Inagata**.

Fokus utama proyek ini adalah:

* Mengonversi desain **pixel-perfect** menjadi implementasi nyata
* Membangun UI yang **responsif di berbagai device**
* Menyusun kode dengan pendekatan **clean, modular, dan scalable**

---

## 📱 Responsive Design

Aplikasi ini dirancang untuk tiga breakpoint utama:

* **Mobile:** 375px
* **Tablet:** 1024px
* **Desktop:** 1440px

Pendekatan yang digunakan adalah **mobile-first design**, sehingga tampilan tetap optimal pada layar kecil sebelum diskalakan ke perangkat yang lebih besar.

---

## 🛠️ Tech Stack

* **Framework:** Laravel 12 (Blade Engine)
* **Styling:** Tailwind CSS
* **Typography:** Plus Jakarta Sans (Google Fonts)
* **Charting:** ApexCharts (Interactive Data Visualization)
* **Icons:** Inline SVG (tanpa dependensi icon library eksternal)

---

## 🧩 Architecture & Approach

Proyek ini menggunakan pendekatan:

* **Component-Based Layout (Blade)**

  * Memisahkan layout menjadi bagian reusable
* **DRY Principle (Don't Repeat Yourself)**

  * Menghindari duplikasi kode
* **Separation of Concerns**

  * Memisahkan struktur layout, komponen UI, dan data

Struktur ini dirancang agar:

* Mudah dikembangkan
* Mudah diintegrasikan ke backend/API
* Maintainable untuk jangka panjang

---

## 🚀 Installation & Setup

### 1. Prasyarat

Pastikan sudah terinstall:

* PHP >= 8.2
* Composer

---

### 2. Install Laravel

```bash
composer create-project laravel/laravel bankku
cd bankku
```

---

### 3. Setup Project

Salin seluruh file dari repositori ini ke dalam project Laravel.

Pastikan file berikut sudah tergantikan:

```
routes/web.php
resources/views/
public/ (jika ada aset tambahan)
```

---

### 4. Jalankan Aplikasi

```bash
php artisan serve
```

Akses melalui browser:

```
http://localhost:8000
```

---

## 📂 Pages & Features

### 🏠 Dashboard

* Overview keuangan
* Kartu kredit dengan gradient UI
* Grafik aktivitas mingguan
* Statistik pengeluaran (donut chart)
* Riwayat saldo

---

### 💳 Credit Cards

* Manajemen kartu
* Visualisasi saldo & limit
* Grafik pengeluaran bulanan

---

### 💸 Transactions

* Riwayat transaksi
* Filter kategori
* Search
* Tabel responsif

---

### 🏦 Loans

* Ringkasan kategori pinjaman
* Tabel pinjaman aktif
* Status badge

---

### ⚙️ Settings

* Edit Profile
* Preferences
* Security
* UI berbasis tab

---

## 💡 Implementation Notes

### ✔️ Responsive Layout

* Sidebar → Desktop & Tablet
* Mobile → Collapse Navigation
* Grid system menyesuaikan breakpoint

---

### ✔️ Data Handling

* Menggunakan **PHP Array (static data)** di Blade
* Mudah di-upgrade ke:

  * API
  * Database

---

### ✔️ Zero Database Dependency

Aplikasi dapat langsung dijalankan tanpa:

* Setup `.env`
* Migrasi database

---

### ✔️ Performance Optimization

* Inline SVG (lebih ringan)
* Struktur Blade minimal
* Tanpa library berlebihan

---

## 🙏 Acknowledgement

Terima kasih kepada tim **Inagata** atas kesempatan technical test yang diberikan.
