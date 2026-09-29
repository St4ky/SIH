-- =======================================================
-- Gap2Grow: MoSPI & NSSTA Cadre Intelligence Platform
-- Database Schema: gap2grow
-- =======================================================

CREATE DATABASE IF NOT EXISTS `gap2grow` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `gap2grow`;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `competency_progress`;
DROP TABLE IF EXISTS `certifications`;
DROP TABLE IF EXISTS `nominations`;
DROP TABLE IF EXISTS `resources`;
DROP TABLE IF EXISTS `self_declared_skills`;
DROP TABLE IF EXISTS `diagnostic_responses`;
DROP TABLE IF EXISTS `diagnostic_sessions`;
DROP TABLE IF EXISTS `diagnostic_questions`;
DROP TABLE IF EXISTS `skill_gaps`;
DROP TABLE IF EXISTS `competency_domains`;
DROP TABLE IF EXISTS `users`;

SET FOREIGN_KEY_CHECKS = 1;

-- 1. Users table (8-10 officers seeded, role binary: learner / admin)
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `employee_id` VARCHAR(50) UNIQUE,
  `cadre` ENUM('ISS','SSS','State DES','Field Survey','NSSTA Faculty') NOT NULL DEFAULT 'ISS',
  `designation` VARCHAR(150),
  `posting` VARCHAR(250),
  `email` VARCHAR(100) UNIQUE NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` ENUM('learner','admin') NOT NULL DEFAULT 'learner',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Competency Domains
CREATE TABLE `competency_domains` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Skill Gaps (core table read across the platform)
CREATE TABLE `skill_gaps` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `domain_id` INT NOT NULL,
  `skill_name` VARCHAR(150) NOT NULL,
  `current_score` TINYINT DEFAULT 0,
  `benchmark_score` TINYINT DEFAULT 80,
  `priority` ENUM('low','medium','high') DEFAULT 'medium',
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `uniq_user_skill` (`user_id`, `skill_name`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`domain_id`) REFERENCES `competency_domains`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Diagnostic Questions bank
CREATE TABLE `diagnostic_questions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `domain_id` INT NOT NULL,
  `difficulty` ENUM('easy','medium','hard') DEFAULT 'medium',
  `question_text` TEXT NOT NULL,
  `options` JSON NOT NULL,
  `correct_option` TINYINT NOT NULL,
  FOREIGN KEY (`domain_id`) REFERENCES `competency_domains`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Diagnostic Sessions
CREATE TABLE `diagnostic_sessions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `domain_id` INT NOT NULL,
  `question_ids` JSON NOT NULL,
  `started_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `completed_at` TIMESTAMP NULL,
  `final_score` TINYINT UNSIGNED NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`domain_id`) REFERENCES `competency_domains`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Diagnostic Responses (actual submissions)
CREATE TABLE `diagnostic_responses` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `question_id` INT NOT NULL,
  `session_id` INT NULL,
  `selected_option` TINYINT NOT NULL,
  `is_correct` TINYINT(1) NOT NULL,
  `taken_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`question_id`) REFERENCES `diagnostic_questions`(`id`),
  FOREIGN KEY (`session_id`) REFERENCES `diagnostic_sessions`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Self-Declared Skills (separate from diagnostic_responses)
CREATE TABLE `self_declared_skills` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `skill_name` VARCHAR(150) NOT NULL,
  `domain_id` INT NOT NULL,
  `claimed_level` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  `declared_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `uniq_user_declared_skill` (`user_id`, `skill_name`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`domain_id`) REFERENCES `competency_domains`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Unified Resources table (Coursera / iGOT / NSSTA / OpenLibrary)
CREATE TABLE `resources` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `source` ENUM('coursera','openlibrary','nssta','igot') NOT NULL DEFAULT 'igot',
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `domain_id` INT NULL,
  `duration` VARCHAR(50) DEFAULT '10 Hours',
  `url` VARCHAR(500) NULL,
  `difficulty` TINYINT DEFAULT 2,
  `cached_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`domain_id`) REFERENCES `competency_domains`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Nominations (Officer course enrollments / recommendations)
CREATE TABLE `nominations` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `resource_id` INT NOT NULL,
  `status` ENUM('pending','confirmed','rejected') DEFAULT 'pending',
  `nominated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `uniq_nomination` (`user_id`, `resource_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`resource_id`) REFERENCES `resources`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Certifications
CREATE TABLE `certifications` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `domain_id` INT NULL,
  `issuing_authority` VARCHAR(150) DEFAULT 'NSSTA Academy Board',
  `issued_date` DATE,
  `cert_hash` VARCHAR(64),
  `digilocker_linked` TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`domain_id`) REFERENCES `competency_domains`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Competency Progress (Longitudinal Quarterly Progression)
CREATE TABLE `competency_progress` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `domain_id` INT NULL,
  `score` TINYINT UNSIGNED NOT NULL,
  `quarter` VARCHAR(20) NOT NULL,
  `recorded_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
