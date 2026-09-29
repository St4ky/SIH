# Gap2Grow (SankhyaAI) — AI Competency & Precision Learning Platform
### Ministry of Statistics & Programme Implementation (MoSPI) | National Statistical Systems Training Academy (NSSTA)
**Smart India Hackathon (SIH 2026) Official Rebuild**

[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777bb4.svg)](https://www.php.net/)
[![Database](https://img.shields.io/badge/MySQL-8.0%2B-4479a1.svg)](https://www.mysql.com/)
[![CSS Framework](https://img.shields.io/badge/Tailwind_CSS-3.x-38bdf8.svg)](https://tailwindcss.com/)
[![AI Engine](https://img.shields.io/badge/Google_Gemini-1.5_Flash-4285f4.svg)](https://ai.google.dev/)
[![Compliance](https://img.shields.io/badge/Standard-GIGW_3.0_Compliant-00a86b.svg)](#compliance--sovereign-governance)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

---

## 📌 Executive Overview

**Gap2Grow** is an enterprise-grade, sovereign competency assessment and adaptive learning pathway platform built specifically for Indian official statistical cadres:
- **Indian Statistical Service (ISS)**
- **Subordinate Statistical Service (SSS)**
- **State Directorates of Economics & Statistics (State DES)**
- **NSSO Field Survey Cadres & NSSTA Faculty**

The platform addresses competency bottlenecks in mission-critical domains (National Accounts SNA 2008, Microdata Analytics, Survey Sampling, Price Indices, Data Science, and DPDP Act 2023 compliance) by combining **live diagnostic psychometrics**, **real-time AI course recommendation pipelines**, **Google Gemini LLM dynamic test batteries**, and **executive workforce analytics**.

---

## 🚀 Key Modules & Architecture

```
                                  +---------------------------------------+
                                  |         Parichay SSO Gateway          |
                                  |   (SSO / e-HRMS Sovereign Auth Mock)  |
                                  +-------------------+-------------------+
                                                      |
                         +----------------------------+----------------------------+
                         |                                                         |
                         v                                                         v
             [ Learner Role Console ]                                  [ Admin Role Console ]
                         |                                                         |
         +---------------+---------------+                         +---------------+---------------+
         |               |               |                         |               |               |
         v               v               v                         v               v               v
   Diagnostic      Personalized      Real-Time                Workforce Hub    Cadre Analytics  Emerging Skill
   Engine & Gap     Learning Path    Course Matcher           Command Center   Leaderboards &   Forecast Matrix
   Analysis         & Nominations    (Coursera / OpenLibrary) (Cadre-Wide)     DPC Reports      (AI Horizon)
         |                               |
         +---------------+---------------+
                         |
                         v
           [ Google Gemini 1.5 Flash ]
         AI Assessment Question Generator
           (With Local Bank Fallback)
```

### 1. Sovereign Government Authentication
- Single Sign-On (SSO) workflow emulating **Parichay Central Authentication** and **e-HRMS 2.0**.
- Anti-bot security captcha generation with session-verified hashes.
- Two-tier Role-Based Access Control (**Learner** vs **Admin**).

### 2. Live Diagnostic Testing & Weighted Scoring Engine
- Multi-difficulty question bank spanning all 4 competency domains:
  1. *Statistical & Economic Competencies* (SNA 2008, SUT, CPI/WPI, PLFS, ASI)
  2. *Technical & Computational Skills* (Python, R-Shiny, SQL, QGIS, ML Nowcasting)
  3. *Digital Governance & Data Policy* (DPDP Act 2023, NDAP, Open Data Protocols)
  4. *Leadership & Behavioural* (Cadre Leadership, Dissemination, Survey Management)
- Mathematically weighted scoring algorithm: Easy ($1.0\times$), Medium ($1.5\times$), Hard ($2.0\times$).
- Real-time upsert into the official `skill_gaps` database table.

### 3. AI Assessment Generator (Google Gemini 1.5 Flash)
- Generates dynamic, Bloom's Taxonomy-calibrated multiple-choice exam batteries on demand via Google Gemini 1.5 Flash.
- Includes automated JSON validation and seamless fallback to a seeded national question bank if API timeouts or rate limits occur.

### 4. Real-Time Gap-to-Course Recommendation Pipeline
- Standalone multi-stage pipeline interface (`pages/recommendation-engine.php`) reachable via *"See how this was chosen"* deep-links.
- Multi-factor scoring formula:
  $$\text{Match \%} = \text{Domain Weight (50\%)} + \text{Difficulty Delta Fit (30\%)} + \text{Recency Weight (20\%)}$$
- Integrates live public catalogs from **Coursera API** (emulating iGOT Karmayogi Beta) and **OpenLibrary API** (emulating NSSTA TPAC).

### 5. Dual-Track Competency Profile (Assessed vs. Self-Declared)
- Merged single-page comparison view displaying **Diagnostic Assessed Scores** side-by-side with **Self-Declared Proficiency Levels** (1–5 Stars).
- Highlights variance metrics to identify overconfidence or unverified skill clusters.

### 6. Admin Workforce Command Center & Cadre Analytics
- National Cadre Competency Index calculation across all officers.
- Departmental & State DES heatmaps, DPC compliance metrics, and high-deficit flags.
- One-click streaming CSV export for Departmental Promotion Committee (DPC) dossiers.

### 7. Full Institutional Public Portal Suite
- Clean public portal navigation conforming to GIGW 3.0 standards:
  - **Portal Landing** (`pages/portal.php`)
  - **About Platform** (`pages/about.php`)
  - **Competency Framework** (`pages/competency-framework.php`)
  - **iGOT Ecosystem** (`pages/igot-ecosystem.php`)
  - **NSSTA TPAC** (`pages/nssta-tpac.php`)
  - **Helpdesk & Cadre Support** (`pages/helpdesk.php`)
  - **Compliance Pages**: RTI, Privacy Policy, Accessibility, Web Information Manager.

---

## 🛠️ Technology Stack

| Layer | Technology |
|---|---|
| **Backend** | PHP 8.2+ (Procedural + OOP PDO Prepared Statements) |
| **Database** | MySQL 8.0+ / MariaDB (InnoDB, UTF-8 mb4 unicode) |
| **Frontend** | HTML5, CSS3, JavaScript (Vanilla ES6+), Tailwind CSS |
| **Design System** | GIGW 3.0 MoSPI Sovereign Tokens (Public Sans, Material Symbols) |
| **Artificial Intelligence** | Google Gemini 1.5 Flash API (`generativelanguage.googleapis.com`) |
| **External Course Feeds** | Coursera API (`api.coursera.org`), OpenLibrary API (`openlibrary.org`) |
| **Environment** | XAMPP / Apache on Windows / Linux |

---

## 📦 Directory Structure

```
SIH/
├── assets/
│   ├── css/
│   │   └── app.css               # Responsive sidebar, table scrolling & toasts
│   └── js/
│       └── app.js                # Drawer toggles, live exam timer, recommendation engine
├── api/
│   ├── ai-copilot.php            # Gemini AI chat endpoint with MoSPI fallbacks
│   ├── diagnostic-score.php      # Psychometric test scoring and gap calculation
│   ├── export-csv.php            # Admin DPC workforce dossier CSV streaming
│   ├── fetch-resources.php       # Coursera & OpenLibrary course cache layer
│   ├── generate-assessment.php   # Dynamic Gemini exam generator endpoint
│   ├── nominate.php              # Course nomination management
│   ├── recommendation-engine.php # Algorithmic recommendation scoring
│   └── self-declared.php         # Self-declared skill ratings updater
├── includes/
│   ├── auth.php                  # Session gates: requireLogin(), requireAdmin()
│   ├── config.php                # Database, base URL, and API key constants
│   ├── db.php                    # PDO connection instance ($pdo)
│   ├── footer.php                # Authenticated dashboard footer & script loader
│   ├── header.php                # Authenticated dashboard top navigation bar
│   ├── public_footer.php         # Sovereign institutional footer
│   ├── public_header.php         # Sovereign curved pill navigation
│   └── sidebar.php               # Collapsible 72-rem cadre navigation sidebar
├── pages/
│   ├── about.php                 # Platform mandate, MoSPI mission, NSSTA team
│   ├── accessibility.php         # GIGW 3.0 accessibility statement
│   ├── admin-dashboard.php       # Workforce Command Center (Admin only)
│   ├── ai-assistant.php          # AI Cadre Copilot workspace
│   ├── assessment-generator.php  # Gemini AI Assessment configuration & preview
│   ├── cadre-analytics.php       # Statistical cadre leaderboards & breakdowns
│   ├── certifications.php        # Sovereign certificates & DigiLocker status
│   ├── competency-framework.php  # Four-domain MoSPI statistical competency pillars
│   ├── competency-profile.php    # Side-by-side Assessed vs Self-Declared view
│   ├── dashboard.php             # Official Learner Dashboard
│   ├── diagnostic-test.php       # Diagnostic test domain selection hub
│   ├── emerging-skills.php       # Predictive AI emerging skill forecasts
│   ├── helpdesk.php              # Cadre ticket submission & contact directory
│   ├── igot-courses.php          # iGOT Karmayogi catalog browser & filters
│   ├── igot-ecosystem.php        # Karmayogi Bharat integration architecture
│   ├── learning-path.php         # Personalized milestone timeline & nominations
│   ├── nssta-programmes.php      # NSSTA TPAC residential & executive masterclasses
│   ├── nssta-tpac.php            # NSSTA TPAC training policy & curriculum
│   ├── performance-gap.php       # Post-assessment diagnostic score dossier
│   ├── portal.php                # Public landing page with curved hero
│   ├── privacy-policy.php        # DPDP Act 2023 privacy statement
│   ├── recommendation-engine.php # Standalone animated match-engine visualizer
│   ├── rti.php                   # Right to Information (RTI Act 2005) disclosures
│   ├── settings.php              # Officer profile & password security settings
│   ├── skill-gap.php             # Detailed skill-gap analysis & remediation cards
│   ├── take-assessment.php       # Live proctored exam engine with countdown timer
│   └── web-information-manager.php# National web portal compliance directory
├── sql/
│   ├── schema.sql                # Complete relational schema (10 tables)
│   └── seed.sql                  # Seed data (Users, Domains, Questions, Gaps)
├── .gitignore                    # Git ignore file for OS, IDE & temporary data
├── .env.example                  # Environment configuration template
├── LICENSE                       # MIT License
├── index.php                     # Sovereign Parichay SSO Authentication page
└── logout.php                    # Session invalidation & redirect handler
```

---

## ⚙️ Installation & Setup Guide

### 1. Prerequisites
- **XAMPP** (with PHP 8.2+ and MySQL / MariaDB) or standalone Apache & MySQL.
- Git installed on your system.

### 2. Clone the Repository
Clone into your web server document root (e.g., `C:/xampp/htdocs/SIH`):
```bash
cd C:/xampp/htdocs
git clone https://github.com/St4ky/SIH.git SIH
```

### 3. Database Setup
1. Start **Apache** and **MySQL** via the XAMPP Control Panel.
2. Open phpMyAdmin (`http://localhost/phpmyadmin`) or MySQL CLI.
3. Import the database schema and sample data:
```bash
mysql -u root -p < C:/xampp/htdocs/SIH/sql/schema.sql
mysql -u root -p gap2grow < C:/xampp/htdocs/SIH/sql/seed.sql
```
*(By default in XAMPP, username is `root` with no password).*

### 4. Configuration
Open `includes/config.php` and verify/adjust settings if necessary:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'gap2grow');
define('DB_USER', 'root');
define('DB_PASS', '');
define('BASE_URL', 'http://localhost/SIH');

// Optional: Set your Gemini API key for live AI assessment generation
define('GEMINI_API_KEY', getenv('GEMINI_API_KEY') ?: 'YOUR_API_KEY_HERE');
```
*Note: If no Gemini API key is provided, the platform automatically utilizes its built-in seeded question bank as a silent fallback.*

### 5. Access the Application
Open your browser and navigate to:
```
http://localhost/SIH/
```

---

## 🔑 Demo Credentials

| Role | Email Address | Password | Cadre & Designation | Access Scope |
|---|---|---|---|---|
| **Learner** | `rajesh.sharma@mospi.gov.in` | `Demo@1234` | ISS — Joint Director, NAD (CSO) | Full Learner Suite, Assessments, Learning Path |
| **Admin** | `admin@nssta.gov.in` | `Admin@1234` | NSSTA Faculty — Director | Full Platform + Workforce Command Center & Emerging Skills |

---

## 🛡️ Compliance & Sovereign Governance

- **GIGW 3.0**: Adheres to Guidelines for Indian Government Websites (contrast ratios, keyboard focus rings, semantic tags).
- **DPDP Act 2023**: Incorporates purpose limitation, digital consent logging, and access control.
- **DoPT Karmayogi Architecture**: Compatible with DoPT Competency Dictionary and NSSTA TPAC annual capacity building framework.

---

## 📄 License
This project is licensed under the [MIT License](LICENSE).
