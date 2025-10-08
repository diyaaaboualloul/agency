# # 🚀 AtoZ Digital Agency

This project is a Laravel-based web application built for a digital/creative agency. It serves as a professional online presence where the agency can present its brand, services, projects, blog posts, and contact information in one unified platform.

---
## our website is live!!
https://agency.dee-tronics.com/


## imgs screenshots
https://imgur.com/a/TfvvIRM
https://imgur.com/a/dC1Oiyb

## 📦 Requirements

- PHP >= 8.1
- Composer
- MySQL 
- Git

---

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone git@github.com:diyaaaboualloul/agency.git
   cd agency
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Create environment file**
   ```bash
   cp .env.example .env
   ```
   - Update `.env` with your database, mail, and reCAPTCHA keys.

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Run database migrations**
   ```bash
   php artisan migrate
   ```

6. **Run seeders (optional but recommended)**
   ```bash
   php artisan db:seed
   ```

7. **Start local development server**
   ```bash
   php artisan serve
   ```

---

## ✨ Features

- ✅ User authentication & roles/permissions (admin/editor)  
- ✅ Email notifications (Mailtrap / SMTP supported)  
- ✅ Google reCAPTCHA v2/v3 integration  
- ✅ Contact form with message management  
- ✅ CMS Dashboard for Home, About, Services, Projects, Blogs, Teams, Contact Info  
- ✅ Soft delete + restore + force delete for services, projects, and blogs  
- ✅ 404 fallback error page  

---

## 📍 Routes Overview

### 🔹 Public
- `/` → Home page  
- `/about` → About page  
- `/services` → Services listing  
- `/services/{id}` → Single service  
- `/portfolio` → Portfolio listing  
- `/portfolio/{slug}` → Single portfolio project  
- `/blogs` → Blog listing  
- `/blogs/{id}` → Single blog post  
- `/contact` → Contact page (with form submission)  

### 🔹 Authentication
- `/login` → User login  
- `/register` → User registration  
- `/forgot-password` → Reset password  

### 🔹 Dashboard
- `/AtoZdashboard` → Main dashboard (requires auth + verified email)  
- `/profile` → Profile management (edit, update, delete account)  

### 🔹 Admin Only
- `/admin/users` → Manage users (list, assign roles, delete, create)  
- `/admin/roles` → Manage roles  

### 🔹 Admin + Editor (Permissions required)
- `/admin/home-sections` → Manage homepage content  
- `/admin/about-sections` → Manage about page content  
- `/admin/services` → Manage services (CRUD + trash/restore/force delete)  
- `/admin/projects` → Manage projects (CRUD + trash/restore/force delete)  
- `/admin/blogs` → Manage blogs (CRUD + trash/restore/force delete + gallery image delete)  
- `/admin/teams` → Manage team members  
- `/admin/contact-info` → Edit contact info  
- `/admin/messages` → View/delete contact messages + mark as read  

### 🔹 Fallback
- Any undefined route → Custom `errors.404` page  

---

## 👤 Default Admin Login (Seeder)

If you run the seeders (`php artisan db:seed`), a default **Admin user** will be created:



⚠️ Make sure to change these credentials immediately after first login.

---

## 📧 Mail Setup

Configure your `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@example.com"
MAIL_FROM_NAME="AtoZ Agency"
```

Use [Mailtrap](https://mailtrap.io/) for local testing or SMTP for production.

---

## 🔐 Google reCAPTCHA Setup

1. Get your keys from [Google reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin/create).  
2. Add them in `.env`:

```env
NOCAPTCHA_SITEKEY=your-site-key
NOCAPTCHA_SECRET=your-secret-key
```

---

## 🛠 Useful Artisan Commands

- Run migrations:  
  ```bash
  php artisan migrate
  ```

- Run seeders:  
  ```bash
  php artisan db:seed
  ```

- Refresh DB (drop & reseed):  
  ```bash
  php artisan migrate:fresh --seed
  ```

- Clear caches:  
  ```bash
  php artisan optimize:clear
  ```

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you’d like to change.

---

## 📄 License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).