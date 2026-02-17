# 🚀 Project Journey & Technical Context

**Project Name:** BestFlightHotelDeals (BFHD)
**Domain:** bestflighthoteldeals.com
**Framework:** Laravel (PHP) + Blade Templates + Vite
**Deployment:** GitHub -> Hostinger Auto-Deploy

---

## 📖 The Story So Far

### **Phase 1: Inception & Rebranding**
*   **Origin:** Started as "TravelHybrid", a generic OTA affiliate site.
*   **Rebrand:** Renamed to "BestFlightHotelDeals" (BFHD) to improve SEO relevance and brand clarity.
*   **Goal:** Create a unified search engine that intelligently routes users to the best affiliate partners (Aviasales, Hotellook, EconomyBookings) without them feeling like they are leaving the site immediately.

### **Phase 2: The Logic (Deep Linking)**
*   **Challenge**: Affiliate partners provided generic homepage links, but we wanted users to land on specific search results (e.g., London to NYC on specific dates).
*   **Solution**: We built a custom **`RoutingController`**.
    *   **Logic**: It takes user inputs (Destination, Dates, Passengers), parses them into the specific format each partner requires (base64, specific query params, IATA codes), and redirects.
    *   **Innovation**: We implemented "Smart Autocomplete" that maps user inputs to partner-specific location IDs (cached locally) to ensure 100% accurate deep links.

### **Phase 3: Hostinger Integration & 500 Errors**
*   **The Nightmare**: Deployment to Hostinger Shared Hosting caused persistent 500 errors.
*   **Root Causes Found**:
    1.  **Missing Vendors**: `vendor` folder excluded from Git but not installed on server.
    2.  **Vite Build**: `public/build` manifest missing because it was ignored in `.gitignore`.
    3.  **Environment**: `.env` file mishandling (APP_KEY missing).
    4.  **Route Caching**: Old route caches causing `RouteNotFound` exceptions.
*   **The Fix**:
    *   Updated `.gitignore` to include `public/build`.
    *   Manual upload of `vendor` folder (one-time).
    *   Strict `.env` management.
    *   Transitioned to **Git Auto-Deployment** to prevent manual file errors.

### **Phase 4: Optimization & Polish**
*   **Aviasales Date Fix**: Users couldn't change dates on the Aviasales destination page. We refactored `RoutingController` to use Query Parameters instead of URL path segments.
*   **Contact Form**: Integrated Brevo API for reliable email delivery, bypassing unreliable PHP `mail()`.
*   **SEO**: Added meta descriptions, dynamic titles, and a blog section structure.

---

## 🏗️ Technical Architecture

### **1. Key Controllers**

*   **`RoutingController.php`** (The Core)
    *   Handles `/redirect` routes.
    *   Contains logic for:
        *   `buildAviasalesDeepLink()`: Flights. Converts dates to YYYY-MM-DD.
        *   `buildHotelsDeepLink()`: Hotellook. Resolves City -> Location ID.
        *   `buildCarsDeepLink()`: EconomyBookings. Complex logic to map airports to internal IDs via API.

*   **`SearchController.php`** (The UI Helper)
    *   Handles Autocomplete API calls to Travelpayouts.
    *   Caches results to speed up dropdowns.

*   **`ContactController.php`** & **`NewsletterController.php`**
    *   Handles form submissions.
    *   Uses **Brevo API** for sending emails.
    *   Saves subscribers to local MySQL database.

### **2. Frontend (Blade)**
*   **`welcome.blade.php`**: The homepage. Contains the complex tabbed search form (Flights/Hotels/Cars).
*   **`layouts/app.blade.php`**: Main wrapper with Header/Footer.
*   **Scripts**: Custom JS in views handles the datepicker interactions and autocomplete delays.

### **3. Database**
*   **Tables**: `subscribers`, `contact_logs`.
*   **Config**: Defined in `.env` (Hostinger MySQL).

---

## 🛠️ Deployment Workflow (Standard Operating Procedure)

We moved away from manual file uploads to a robust Git flow.

1.  **Local Development**:
    *   Code in `c:\Users\john\OneDrive\Desktop\skyteam\bfhd\public_html`
    *   Test: `php artisan serve`

2.  **Push to Live**:
    ```powershell
    git add .
    git commit -m "Update description"
    git push origin main
    ```

3.  **Hostinger Action**:
    *   Hostinger Webhook detects push.
    *   Auto-pulls changes to `public_html`.
    *   **Note**: `.env` is NOT touched by Git. It lives on the server.

---

## 🔮 Future Roadmap (The "To-Do")

1.  **Blog Content**: The blog views exist but need content population for SEO.
2.  **Partner Expansion**: Implement the strategies in `MONETIZATION_ROADMAP.md`.
3.  **User Accounts**: Potential future feature to save searches.
4.  **Performance**: Move from Shared Hosting to VPS if traffic exceeds 50k/month.
