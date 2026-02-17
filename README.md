# 🌍 BestFlightHotelDeals.com - Ethical Tech for Global Good

**A full-stack travel aggregation platform built to democratize travel access through transparent pricing and innovation.**

[![SDG 9](https://img.shields.io/badge/SDG-9%20Industry%20%26%20Innovation-orange?style=for-the-badge)](https://sdgs.un.org/goals/goal9)
[![Laravel](https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel)](https://laravel.com)
[![Status](https://img.shields.io/badge/Status-Live-green?style=for-the-badge)](https://bestflighthoteldeals.com)

## 🚀 Impact & Mission (SDG 9)

**Problem:** The travel industry is plagued by opaque pricing, hidden fees, and monopolistic structures that make travel inaccessible for many.
**Solution:** A transparent, API-driven aggregation engine that empowers users to find the true lowest prices without dark patterns.
**Goal:** To build resilient infrastructure that promotes inclusive and sustainable industrialization in the travel sector.

---

## 🛠️ Tech Stack

- **Framework:** Laravel 10 (PHP 8.2)
- **Frontend:** Blade Templates + TailwindCSS (Mobile-First)
- **Database:** MySQL 8.0
- **APIs:** Amadeus (Flights), Google Maps, Exchange Rates
- **Analytics:** GA4 + Microsoft Clarity (Privacy-focused tracking)
- **Infrastructure:** Automated SEO pipelines, dynamic sitemap generation

---

## 🔑 Key Features

1.  **Real-Time Aggregation:** Queries multiple GDS systems simultaneously to find the absolute lowest fares.
2.  **Transparent Pricing:** "True Cost" analysis reveals hidden baggage and seat fees before booking.
3.  **Performance:** Optimized for low-bandwidth environments (critical for inclusive access).
4.  **SEO Automation:** Custom artisan commands to auto-index new content (`php artisan sitemap:generate`).

---

## 📦 Installation (For Judges & Developers)

Clone the repo:

```bash
git clone https://github.com/StartUp-202/bestflighthoteldeals.git
cd bestflighthoteldeals
```

Install dependencies:

```bash
composer install
npm install && npm run build
```

Setup environment:

```bash
cp .env.example .env
php artisan key:generate
```

Run database migrations:

```bash
php artisan migrate --seed
```

Start local server:

```bash
php artisan serve
```

---

## 🔒 Security

- **Authentication:** Laravel Sanctum
- **Protection:** CSRF protection, SQL injection prevention, XSS escaping (Blade)
- **Privacy:** Metrics are anonymized; no personal user data is sold.

---

## 🏆 Japan Youth Summit 2026 Submission

This project represents a practical contribution to **SDG 9 (Target 9.c)**: _Significantly increase access to information and communications technology and strive to provide universal and affordable access to the Internet in least developed countries by 2020._

By lowering the cost barrier to travel knowledge, we empower youth and communities to connect globally.

---

**© 2026 BestFlightHotelDeals** | Built with ❤️ for the world.
