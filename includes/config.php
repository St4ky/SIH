<?php
// =======================================================
// Gap2Grow: System Configuration
// =======================================================

// Database connection
define('DB_HOST', 'localhost');
define('DB_NAME', 'gap2grow');
define('DB_USER', 'root');
define('DB_PASS', '');

// Base URL for links and assets
define('BASE_URL', 'http://localhost/SIH');

// Public External APIs
define('COURSERA_API_BASE', 'https://api.coursera.org/api/courses.v1');
define('OPENLIBRARY_API_BASE', 'https://openlibrary.org/search.json');

// Gemini LLM API Key (Can be set via environment variable or edited directly)
define('GEMINI_API_KEY', getenv('GEMINI_API_KEY') ?: 'YOUR_GEMINI_API_KEY_HERE');

// Resource Cache duration in hours
define('RESOURCE_CACHE_HOURS', 6);
