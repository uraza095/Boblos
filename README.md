# 🍰 Boblos Patisserie

Welcome to the **Boblos Patisserie** repository! This is an elegant, full-featured web application built with Laravel, designed to provide a seamless and delightful experience for discovering our artisan cakes, pastries, and booking events.

<p align="center">
  <img src="public/assets/images/Logo_pink.png" width="300" alt="Boblos Patisserie">
</p>

## ✨ Features

- **Beautiful Hero Video:** A welcoming full-screen video experience showcasing our patisserie.
- **Dynamic Menu Highlights:** Browse our freshly baked items with dedicated, stylish menu tabs.
- **Event Booking:** Easily book events or reserve a table with our intuitive booking forms.
- **Responsive Design:** A fully responsive, mobile-first design ensuring the site looks gorgeous on any device.

## 🛠️ Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap
- **Styling:** Custom CSS with elegant color palettes and typography

## 🚀 Getting Started

### Prerequisites
Make sure you have [Composer](https://getcomposer.org/) and [Node.js](https://nodejs.org/) installed on your machine.

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/uraza095/Boblos.git
   cd Boblos
   ```

2. **Install PHP Dependencies:**
   ```bash
   composer install
   ```

3. **Install NPM Dependencies:**
   ```bash
   npm install
   npm run build
   ```

4. **Environment Setup:**
   Copy the example environment file and generate an application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration:**
   Set up your `.env` file with your database credentials.

6. **Run Migrations & Seeders:**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Storage Link:**
   ```bash
   php artisan storage:link
   ```

8. **Start the Development Server:**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000` in your browser.

---

## 🔒 Admin Dashboard Panel

A premium backend management interface designed to manage all dynamic content, categories, menu items, and static page sections.

### Admin Setup Instructions

1. **Login Details**:
   - **Access URL:** `http://localhost:8000/admin/login`
   - **Email:** `admin@fignolive.pk`
   - **Password:** `password`

2. **Features Built**:
   - **Dashboard**: High-level counts and overview of recently added items.
   - **Categories CRUD**: Add and edit menu categories with image uploading, status, and display orders.
   - **Menu Items CRUD**: Create menu items with discount price options, tags, availability toggle, and home featured switch.
   - **Page Content Manager**: Edit dynamic fields/sections for any static page using a JSON content store and rich text TinyMCE WYSIWYG editor.
   - **General Settings**: Edit site brand names, contact phones/emails, opening times, custom logo and favicon files.

---

<p align="center">Made with ❤️ for Patisserie Lovers</p>
