# GeoNames API Explorer

A simple web application built with HTML, CSS, JavaScript, and PHP, styled using locally hosted Bootstrap. It allows users to interact with a selection of GeoNames APIs and view structured JSON responses in the browser.

The project showcases how to build a modular, API-driven frontend with clean architecture using local PHP files that return **JSON only**, as per project guidelines.

---

## 🔧 Features

- Clean, responsive UI (no CDNs)
- Inputs for 4 different APIs
- All data fetched via PHP and returned as raw JSON
- No inline CSS or JS — all code is separated
- Fully local Bootstrap assets

---

## 🌐 APIs Included

| API | What it does | Sample input |
|-----|--------------|--------------|
| **Nearby Weather** | Returns current weather conditions based on latitude and longitude | `lat: 51.5074`, `lng: -0.1278` (London) |
| **Country Info**   | Returns info about a country using ISO 2-letter code | `code: GB` (United Kingdom) |
| **Earthquakes**    | Returns earthquake data in a bounding box | `north: 55.8`, `south: 49.9`, `east: 1.8`, `west: -6.0` (England) |
| **Nearby Postcodes** | Returns postcodes near a location | `lat: 51.5074`, `lng: -0.1278` (London) |

---

## 📁 Folder Structure

```
task/
├── api/
│   ├── config.php
│   ├── country.php
│   ├── earthquake.php
│   ├── postcode.php
│   └── weather.php
├── vendor/
│   └── bootstrap/
│       ├── css/bootstrap.min.css
│       └── js/bootstrap.bundle.min.js
├── app.js
├── style.css
├── index.html
```

---

## 🚀 How to Use

1. Open XAMPP and start **Apache**.
2. Place this project folder inside `htdocs` as:  
   `htdocs/task/`
3. In your browser, go to:  
   `http://localhost/task/index.html`
4. Enter values into the appropriate fields for each API.
5. Results will appear in the `<pre>` block at the bottom.

### Example Test Inputs:

- **Weather** → `51.5074`, `-0.1278`
- **Country Info** → `GB`
- **Earthquakes** → `55.8`, `49.9`, `1.8`, `-6.0`
- **Postcodes** → `51.5074`, `-0.1278`

---

## 📌 Notes

- All data is retrieved via `fetch()` to local PHP endpoints (not directly from the browser).
- No CDN or external assets used — all Bootstrap files are local.
- Responsive layout using `container-fluid` and Bootstrap tables.
- Only valid JSON is returned from the PHP files — no HTML or text.

---

## ✅ Ready for Review

This project adheres to all architecture requirements:
- Separated concerns
- Local asset usage
- No HTML returned from PHP
- JSON API output
- Bootstrap used properly without CDN

