-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2026 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visa_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `passwords`) VALUES
(1, 'ayoguchimezie00@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `business_visa_applications`
--

CREATE TABLE `business_visa_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_ref` varchar(30) NOT NULL,
  `entry_source` enum('visa_page','country_page') NOT NULL,
  `current_step` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('draft','submitted','under_review','additional_documents_required','approved','rejected','visa_issued') NOT NULL DEFAULT 'draft',
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_city` varchar(100) NOT NULL,
  `birth_country` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `current_residence_country` varchar(100) NOT NULL,
  `marital_status` enum('single','married','divorced','separated','widowed') NOT NULL,
  `national_id_number` varchar(100) DEFAULT NULL,
  `passport_type` enum('regular','official','diplomatic') NOT NULL,
  `passport_number` varchar(50) NOT NULL,
  `issuing_country` varchar(100) NOT NULL,
  `issuing_authority` varchar(150) NOT NULL,
  `date_of_issue` date NOT NULL,
  `expiry_date` date NOT NULL,
  `previous_passport_number` varchar(50) DEFAULT NULL,
  `has_another_valid_passport` tinyint(1) NOT NULL DEFAULT 0,
  `residential_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_province` varchar(100) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile_phone` varchar(30) NOT NULL,
  `alt_phone` varchar(30) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `destination_country` varchar(100) NOT NULL,
  `purpose_of_travel` text NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `duration_days` int(10) UNSIGNED NOT NULL,
  `number_of_entries` enum('single','multiple') NOT NULL,
  `stay_type` enum('hotel','host_invitation') NOT NULL,
  `accommodation_name` varchar(150) DEFAULT NULL,
  `stay_address` varchar(255) DEFAULT NULL,
  `stay_contact_phone` varchar(30) DEFAULT NULL,
  `host_full_name` varchar(150) DEFAULT NULL,
  `host_relationship` varchar(100) DEFAULT NULL,
  `applicant_status` enum('employed','self_employed','student') NOT NULL,
  `employer_name` varchar(150) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `monthly_income` decimal(12,2) DEFAULT NULL,
  `business_name` varchar(150) DEFAULT NULL,
  `business_type` varchar(120) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `institution_name` varchar(150) DEFAULT NULL,
  `course_of_study` varchar(150) DEFAULT NULL,
  `expected_graduation_date` date DEFAULT NULL,
  `sponsor_type` enum('self','sponsor') NOT NULL,
  `estimated_travel_cost` decimal(12,2) NOT NULL,
  `available_funds_amount` decimal(12,2) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `sponsor_name` varchar(150) DEFAULT NULL,
  `sponsor_relationship` varchar(100) DEFAULT NULL,
  `has_traveled_before` tinyint(1) NOT NULL DEFAULT 0,
  `countries_visited` text DEFAULT NULL,
  `visa_denied_before` tinyint(1) NOT NULL DEFAULT 0,
  `visa_denial_details` text DEFAULT NULL,
  `doc_passport_biodata` varchar(500) DEFAULT NULL,
  `doc_passport_photo` varchar(500) DEFAULT NULL,
  `doc_travel_itinerary` varchar(500) DEFAULT NULL,
  `doc_hotel_booking_or_invitation` varchar(500) DEFAULT NULL,
  `doc_bank_statement` varchar(500) DEFAULT NULL,
  `doc_employment_or_school_letter` varchar(500) DEFAULT NULL,
  `doc_additional_supporting` varchar(500) DEFAULT NULL,
  `declaration_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `applicant_full_name_typed` varchar(200) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `signature_type` enum('typed','drawn') DEFAULT NULL,
  `signature_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_visa_applications`
--

CREATE TABLE `family_visa_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_ref` varchar(30) NOT NULL,
  `entry_source` enum('visa_page','country_page') NOT NULL,
  `current_step` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('draft','submitted','under_review','additional_documents_required','approved','rejected','visa_issued') NOT NULL DEFAULT 'draft',
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_city` varchar(100) NOT NULL,
  `birth_country` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `current_residence_country` varchar(100) NOT NULL,
  `marital_status` enum('single','married','divorced','separated','widowed') NOT NULL,
  `national_id_number` varchar(100) DEFAULT NULL,
  `passport_type` enum('regular','official','diplomatic') NOT NULL,
  `passport_number` varchar(50) NOT NULL,
  `issuing_country` varchar(100) NOT NULL,
  `issuing_authority` varchar(150) NOT NULL,
  `date_of_issue` date NOT NULL,
  `expiry_date` date NOT NULL,
  `previous_passport_number` varchar(50) DEFAULT NULL,
  `has_another_valid_passport` tinyint(1) NOT NULL DEFAULT 0,
  `residential_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_province` varchar(100) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile_phone` varchar(30) NOT NULL,
  `alt_phone` varchar(30) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `destination_country` varchar(100) NOT NULL,
  `purpose_of_travel` text NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `duration_days` int(10) UNSIGNED NOT NULL,
  `number_of_entries` enum('single','multiple') NOT NULL,
  `stay_type` enum('hotel','host_invitation') NOT NULL,
  `accommodation_name` varchar(150) DEFAULT NULL,
  `stay_address` varchar(255) DEFAULT NULL,
  `stay_contact_phone` varchar(30) DEFAULT NULL,
  `host_full_name` varchar(150) DEFAULT NULL,
  `host_relationship` varchar(100) DEFAULT NULL,
  `applicant_status` enum('employed','self_employed','student') NOT NULL,
  `employer_name` varchar(150) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `monthly_income` decimal(12,2) DEFAULT NULL,
  `business_name` varchar(150) DEFAULT NULL,
  `business_type` varchar(120) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `institution_name` varchar(150) DEFAULT NULL,
  `course_of_study` varchar(150) DEFAULT NULL,
  `expected_graduation_date` date DEFAULT NULL,
  `sponsor_type` enum('self','sponsor') NOT NULL,
  `estimated_travel_cost` decimal(12,2) NOT NULL,
  `available_funds_amount` decimal(12,2) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `sponsor_name` varchar(150) DEFAULT NULL,
  `sponsor_relationship` varchar(100) DEFAULT NULL,
  `has_traveled_before` tinyint(1) NOT NULL DEFAULT 0,
  `countries_visited` text DEFAULT NULL,
  `visa_denied_before` tinyint(1) NOT NULL DEFAULT 0,
  `visa_denial_details` text DEFAULT NULL,
  `doc_passport_biodata` varchar(500) DEFAULT NULL,
  `doc_passport_photo` varchar(500) DEFAULT NULL,
  `doc_travel_itinerary` varchar(500) DEFAULT NULL,
  `doc_hotel_booking_or_invitation` varchar(500) DEFAULT NULL,
  `doc_bank_statement` varchar(500) DEFAULT NULL,
  `doc_employment_or_school_letter` varchar(500) DEFAULT NULL,
  `doc_additional_supporting` varchar(500) DEFAULT NULL,
  `declaration_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `applicant_full_name_typed` varchar(200) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `signature_type` enum('typed','drawn') DEFAULT NULL,
  `signature_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immigration_visa_applications`
--

CREATE TABLE `immigration_visa_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_ref` varchar(30) NOT NULL,
  `entry_source` enum('visa_page','country_page') NOT NULL,
  `current_step` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('draft','submitted','under_review','additional_documents_required','approved','rejected','visa_issued') NOT NULL DEFAULT 'draft',
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_city` varchar(100) NOT NULL,
  `birth_country` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `current_residence_country` varchar(100) NOT NULL,
  `marital_status` enum('single','married','divorced','separated','widowed') NOT NULL,
  `national_id_number` varchar(100) DEFAULT NULL,
  `passport_type` enum('regular','official','diplomatic') NOT NULL,
  `passport_number` varchar(50) NOT NULL,
  `issuing_country` varchar(100) NOT NULL,
  `issuing_authority` varchar(150) NOT NULL,
  `date_of_issue` date NOT NULL,
  `expiry_date` date NOT NULL,
  `previous_passport_number` varchar(50) DEFAULT NULL,
  `has_another_valid_passport` tinyint(1) NOT NULL DEFAULT 0,
  `residential_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_province` varchar(100) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile_phone` varchar(30) NOT NULL,
  `alt_phone` varchar(30) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `destination_country` varchar(100) NOT NULL,
  `purpose_of_travel` text NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `duration_days` int(10) UNSIGNED NOT NULL,
  `number_of_entries` enum('single','multiple') NOT NULL,
  `stay_type` enum('hotel','host_invitation') NOT NULL,
  `accommodation_name` varchar(150) DEFAULT NULL,
  `stay_address` varchar(255) DEFAULT NULL,
  `stay_contact_phone` varchar(30) DEFAULT NULL,
  `host_full_name` varchar(150) DEFAULT NULL,
  `host_relationship` varchar(100) DEFAULT NULL,
  `applicant_status` enum('employed','self_employed','student') NOT NULL,
  `employer_name` varchar(150) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `monthly_income` decimal(12,2) DEFAULT NULL,
  `business_name` varchar(150) DEFAULT NULL,
  `business_type` varchar(120) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `institution_name` varchar(150) DEFAULT NULL,
  `course_of_study` varchar(150) DEFAULT NULL,
  `expected_graduation_date` date DEFAULT NULL,
  `sponsor_type` enum('self','sponsor') NOT NULL,
  `estimated_travel_cost` decimal(12,2) NOT NULL,
  `available_funds_amount` decimal(12,2) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `sponsor_name` varchar(150) DEFAULT NULL,
  `sponsor_relationship` varchar(100) DEFAULT NULL,
  `has_traveled_before` tinyint(1) NOT NULL DEFAULT 0,
  `countries_visited` text DEFAULT NULL,
  `visa_denied_before` tinyint(1) NOT NULL DEFAULT 0,
  `visa_denial_details` text DEFAULT NULL,
  `doc_passport_biodata` varchar(500) DEFAULT NULL,
  `doc_passport_photo` varchar(500) DEFAULT NULL,
  `doc_travel_itinerary` varchar(500) DEFAULT NULL,
  `doc_hotel_booking_or_invitation` varchar(500) DEFAULT NULL,
  `doc_bank_statement` varchar(500) DEFAULT NULL,
  `doc_employment_or_school_letter` varchar(500) DEFAULT NULL,
  `doc_additional_supporting` varchar(500) DEFAULT NULL,
  `declaration_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `applicant_full_name_typed` varchar(200) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `signature_type` enum('typed','drawn') DEFAULT NULL,
  `signature_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `immigration_type` varchar(50) DEFAULT NULL,
  `intended_years_of_stay` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_visa_applications`
--

CREATE TABLE `student_visa_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_ref` varchar(30) NOT NULL,
  `entry_source` enum('visa_page','country_page') NOT NULL,
  `current_step` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('draft','submitted','under_review','additional_documents_required','approved','rejected','visa_issued') NOT NULL DEFAULT 'draft',
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_city` varchar(100) NOT NULL,
  `birth_country` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `current_residence_country` varchar(100) NOT NULL,
  `marital_status` enum('single','married','divorced','separated','widowed') NOT NULL,
  `national_id_number` varchar(100) DEFAULT NULL,
  `passport_type` enum('regular','official','diplomatic') NOT NULL,
  `passport_number` varchar(50) NOT NULL,
  `issuing_country` varchar(100) NOT NULL,
  `issuing_authority` varchar(150) NOT NULL,
  `date_of_issue` date NOT NULL,
  `expiry_date` date NOT NULL,
  `previous_passport_number` varchar(50) DEFAULT NULL,
  `has_another_valid_passport` tinyint(1) NOT NULL DEFAULT 0,
  `residential_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_province` varchar(100) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile_phone` varchar(30) NOT NULL,
  `alt_phone` varchar(30) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `destination_country` varchar(100) NOT NULL,
  `purpose_of_travel` text NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `duration_days` int(10) UNSIGNED NOT NULL,
  `number_of_entries` enum('single','multiple') NOT NULL,
  `stay_type` enum('hotel','host_invitation') NOT NULL,
  `accommodation_name` varchar(150) DEFAULT NULL,
  `stay_address` varchar(255) DEFAULT NULL,
  `stay_contact_phone` varchar(30) DEFAULT NULL,
  `host_full_name` varchar(150) DEFAULT NULL,
  `host_relationship` varchar(100) DEFAULT NULL,
  `applicant_status` enum('employed','self_employed','student') NOT NULL,
  `employer_name` varchar(150) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `monthly_income` decimal(12,2) DEFAULT NULL,
  `business_name` varchar(150) DEFAULT NULL,
  `business_type` varchar(120) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `institution_name` varchar(150) DEFAULT NULL,
  `course_of_study` varchar(150) DEFAULT NULL,
  `expected_graduation_date` date DEFAULT NULL,
  `sponsor_type` enum('self','sponsor') NOT NULL,
  `estimated_travel_cost` decimal(12,2) NOT NULL,
  `available_funds_amount` decimal(12,2) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `sponsor_name` varchar(150) DEFAULT NULL,
  `sponsor_relationship` varchar(100) DEFAULT NULL,
  `has_traveled_before` tinyint(1) NOT NULL DEFAULT 0,
  `countries_visited` text DEFAULT NULL,
  `visa_denied_before` tinyint(1) NOT NULL DEFAULT 0,
  `visa_denial_details` text DEFAULT NULL,
  `doc_passport_biodata` varchar(500) DEFAULT NULL,
  `doc_passport_photo` varchar(500) DEFAULT NULL,
  `doc_travel_itinerary` varchar(500) DEFAULT NULL,
  `doc_hotel_booking_or_invitation` varchar(500) DEFAULT NULL,
  `doc_bank_statement` varchar(500) DEFAULT NULL,
  `doc_employment_or_school_letter` varchar(500) DEFAULT NULL,
  `doc_additional_supporting` varchar(500) DEFAULT NULL,
  `declaration_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `applicant_full_name_typed` varchar(200) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `signature_type` enum('typed','drawn') DEFAULT NULL,
  `signature_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_visa_applications`
--

CREATE TABLE `travel_visa_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_ref` varchar(30) NOT NULL,
  `entry_source` enum('visa_page','country_page') NOT NULL,
  `current_step` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('draft','submitted','under_review','additional_documents_required','approved','rejected','visa_issued') NOT NULL DEFAULT 'draft',
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_city` varchar(100) NOT NULL,
  `birth_country` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `current_residence_country` varchar(100) NOT NULL,
  `marital_status` enum('single','married','divorced','separated','widowed') NOT NULL,
  `national_id_number` varchar(100) DEFAULT NULL,
  `passport_type` enum('regular','official','diplomatic') NOT NULL,
  `passport_number` varchar(50) NOT NULL,
  `issuing_country` varchar(100) NOT NULL,
  `issuing_authority` varchar(150) NOT NULL,
  `date_of_issue` date NOT NULL,
  `expiry_date` date NOT NULL,
  `previous_passport_number` varchar(50) DEFAULT NULL,
  `has_another_valid_passport` tinyint(1) NOT NULL DEFAULT 0,
  `residential_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_province` varchar(100) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile_phone` varchar(30) NOT NULL,
  `alt_phone` varchar(30) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `destination_country` varchar(100) NOT NULL,
  `purpose_of_travel` text NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `duration_days` int(10) UNSIGNED NOT NULL,
  `number_of_entries` enum('single','multiple') NOT NULL,
  `stay_type` enum('hotel','host_invitation') NOT NULL,
  `accommodation_name` varchar(150) DEFAULT NULL,
  `stay_address` varchar(255) DEFAULT NULL,
  `stay_contact_phone` varchar(30) DEFAULT NULL,
  `host_full_name` varchar(150) DEFAULT NULL,
  `host_relationship` varchar(100) DEFAULT NULL,
  `applicant_status` enum('employed','self_employed','student') NOT NULL,
  `employer_name` varchar(150) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `monthly_income` decimal(12,2) DEFAULT NULL,
  `business_name` varchar(150) DEFAULT NULL,
  `business_type` varchar(120) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `institution_name` varchar(150) DEFAULT NULL,
  `course_of_study` varchar(150) DEFAULT NULL,
  `expected_graduation_date` date DEFAULT NULL,
  `sponsor_type` enum('self','sponsor') NOT NULL,
  `estimated_travel_cost` decimal(12,2) NOT NULL,
  `available_funds_amount` decimal(12,2) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `sponsor_name` varchar(150) DEFAULT NULL,
  `sponsor_relationship` varchar(100) DEFAULT NULL,
  `has_traveled_before` tinyint(1) NOT NULL DEFAULT 0,
  `countries_visited` text DEFAULT NULL,
  `visa_denied_before` tinyint(1) NOT NULL DEFAULT 0,
  `visa_denial_details` text DEFAULT NULL,
  `doc_passport_biodata` varchar(500) DEFAULT NULL,
  `doc_passport_photo` varchar(500) DEFAULT NULL,
  `doc_travel_itinerary` varchar(500) DEFAULT NULL,
  `doc_hotel_booking_or_invitation` varchar(500) DEFAULT NULL,
  `doc_bank_statement` varchar(500) DEFAULT NULL,
  `doc_employment_or_school_letter` varchar(500) DEFAULT NULL,
  `doc_additional_supporting` varchar(500) DEFAULT NULL,
  `declaration_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `applicant_full_name_typed` varchar(200) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `signature_type` enum('typed','drawn') DEFAULT NULL,
  `signature_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `business_visa_applications`
--
ALTER TABLE `business_visa_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_ref` (`application_ref`),
  ADD KEY `idx_passport_number` (`passport_number`),
  ADD KEY `idx_email` (`email`);

--
-- Indexes for table `family_visa_applications`
--
ALTER TABLE `family_visa_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_ref` (`application_ref`),
  ADD KEY `idx_passport_number` (`passport_number`),
  ADD KEY `idx_email` (`email`);

--
-- Indexes for table `immigration_visa_applications`
--
ALTER TABLE `immigration_visa_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_ref` (`application_ref`),
  ADD KEY `idx_passport_number` (`passport_number`),
  ADD KEY `idx_email` (`email`);

--
-- Indexes for table `student_visa_applications`
--
ALTER TABLE `student_visa_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_ref` (`application_ref`),
  ADD KEY `idx_passport_number` (`passport_number`),
  ADD KEY `idx_email` (`email`);

--
-- Indexes for table `travel_visa_applications`
--
ALTER TABLE `travel_visa_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_ref` (`application_ref`),
  ADD KEY `idx_passport_number` (`passport_number`),
  ADD KEY `idx_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_visa_applications`
--
ALTER TABLE `business_visa_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_visa_applications`
--
ALTER TABLE `family_visa_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immigration_visa_applications`
--
ALTER TABLE `immigration_visa_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_visa_applications`
--
ALTER TABLE `student_visa_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel_visa_applications`
--
ALTER TABLE `travel_visa_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
