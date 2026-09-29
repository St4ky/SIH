USE `gap2grow`;

-- =======================================================
-- 1. COMPETENCY DOMAINS
-- =======================================================
INSERT INTO `competency_domains` (`id`, `name`) VALUES
(1, 'Statistical & Economic Competencies'),
(2, 'Technical & Computational Skills'),
(3, 'Digital Governance & Data Policy'),
(4, 'Leadership & Behavioural');

-- =======================================================
-- 2. USERS (bcrypt hashes: Demo@1234, Admin@1234)
-- =======================================================
-- Password Demo@1234 : $2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy
-- Password Admin@1234: $2y$10$TXZsJYOqG7BDQ7vy9AddRexVOuMWElA.jNQczhnCYQeWFJShAPOA6
INSERT INTO `users` (`id`, `name`, `employee_id`, `cadre`, `designation`, `posting`, `email`, `password_hash`, `role`) VALUES
(1, 'NSSTA Admin', 'NSSTA-ADMIN-001', 'NSSTA Faculty', 'Director & Cadre Controller', 'NSSTA Campus, Greater Noida', 'admin@nssta.gov.in', '$2y$10$TXZsJYOqG7BDQ7vy9AddRexVOuMWElA.jNQczhnCYQeWFJShAPOA6', 'admin'),
(2, 'Dr. Rajesh Sharma, ISS', 'ISS-2008-0412', 'ISS', 'Joint Director, NAD (CSO)', 'Central Statistics Office, Sardar Patel Bhawan, New Delhi', 'rajesh.sharma@mospi.gov.in', '$2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy', 'learner'),
(3, 'Priya Nair, SSS', 'SSS-2015-1089', 'SSS', 'Senior Statistical Officer', 'Social Statistics Division, West Block-8, R.K. Puram, New Delhi', 'priya.nair@mospi.gov.in', '$2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy', 'learner'),
(4, 'Amit Gupta, ISS', 'ISS-2012-0651', 'ISS', 'Deputy Director', 'Regional Office, NSSO (FOD), Mumbai', 'amit.gupta@mospi.gov.in', '$2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy', 'learner'),
(5, 'Sunita Patel, SSS', 'SSS-2018-2411', 'SSS', 'Junior Statistical Officer', 'Industrial Statistics Wing (CSO), Kolkata', 'sunita.patel@mospi.gov.in', '$2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy', 'learner'),
(6, 'Kiran Rao, DES', 'DES-KA-2010-0045', 'State DES', 'Joint Director (Economics & Statistics)', 'Directorate of Economics & Statistics, MS Building, Bengaluru', 'kiran.rao@karnataka.gov.in', '$2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy', 'learner'),
(7, 'Meera Krishnan, ISS', 'ISS-2019-0922', 'ISS', 'Assistant Director', 'Prices & Cost of Living Unit, MoSPI, New Delhi', 'meera.k@mospi.gov.in', '$2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy', 'learner'),
(8, 'Deepak Verma, FOD', 'FOD-2016-3390', 'Field Survey', 'Senior Survey Supervisor', 'NSSO Field Operations Division, Patna Regional Office', 'deepak.verma@mospi.gov.in', '$2y$10$f1cq8CMvh5/1qo5a8kYLLObUZArazvObedzdaLwFyR6f3uOV5TPHy', 'learner');

-- =======================================================
-- 3. SKILL GAPS (Core Evaluation Table)
-- =======================================================
INSERT INTO `skill_gaps` (`user_id`, `domain_id`, `skill_name`, `current_score`, `benchmark_score`, `priority`) VALUES
-- Dr. Rajesh Sharma (user_id = 2)
(2, 1, 'National Accounts (SNA 2008)', 92, 80, 'low'),
(2, 1, 'Survey Sampling Design', 88, 80, 'low'),
(2, 1, 'Price Indices (CPI/WPI)', 80, 80, 'low'),
(2, 1, 'SDG National Framework', 76, 80, 'medium'),
(2, 2, 'SQL for Microdata Analysis', 78, 75, 'low'),
(2, 2, 'R / R-Shiny Studio', 70, 75, 'medium'),
(2, 2, 'Python Data Stack (Pandas/NumPy)', 58, 75, 'high'),
(2, 2, 'GIS & Remote Sensing in Surveys', 44, 80, 'high'),
(2, 2, 'Machine Learning & Nowcasting', 52, 78, 'high'),
(2, 3, 'DPDP Act & Digital Privacy', 85, 75, 'low'),
(2, 3, 'Govt Cloud & DPI Integration', 72, 75, 'medium'),
(2, 4, 'Cadre Leadership & Ethics', 75, 70, 'low'),
(2, 4, 'Statistical Dissemination & Policy', 68, 70, 'medium'),

-- Priya Nair (user_id = 3)
(3, 1, 'Social Statistics & Demography', 82, 80, 'low'),
(3, 1, 'National Accounts (SNA 2008)', 64, 75, 'medium'),
(3, 2, 'Python Data Stack (Pandas/NumPy)', 48, 75, 'high'),
(3, 2, 'SQL for Microdata Analysis', 72, 75, 'medium'),
(3, 3, 'DPDP Act & Digital Privacy', 70, 75, 'medium'),
(3, 4, 'Cadre Leadership & Ethics', 74, 70, 'low'),

-- Amit Gupta (user_id = 4)
(4, 1, 'Field Operations Quality Control', 86, 80, 'low'),
(4, 1, 'Survey Sampling Design', 74, 80, 'medium'),
(4, 2, 'GIS & Remote Sensing in Surveys', 50, 75, 'high'),
(4, 2, 'R / R-Shiny Studio', 60, 75, 'high'),
(4, 3, 'Govt Cloud & DPI Integration', 80, 75, 'low'),

-- Sunita Patel (user_id = 5)
(5, 1, 'Annual Survey of Industries (ASI)', 85, 80, 'low'),
(5, 1, 'Index of Industrial Production (IIP)', 78, 80, 'low'),
(5, 2, 'SQL for Microdata Analysis', 65, 75, 'medium'),
(5, 2, 'Python Data Stack (Pandas/NumPy)', 52, 75, 'high'),

-- Kiran Rao (user_id = 6)
(6, 1, 'State Domestic Product (GSDP)', 88, 80, 'low'),
(6, 1, 'District Level Estimates', 82, 80, 'low'),
(6, 2, 'GIS & Remote Sensing in Surveys', 60, 75, 'medium'),
(6, 3, 'DPDP Act & Digital Privacy', 66, 75, 'medium'),

-- Meera Krishnan (user_id = 7)
(7, 1, 'Price Indices (CPI/WPI)', 90, 80, 'low'),
(7, 2, 'Machine Learning & Nowcasting', 56, 75, 'high'),
(7, 2, 'Python Data Stack (Pandas/NumPy)', 62, 75, 'medium'),

-- Deepak Verma (user_id = 8)
(8, 1, 'CAPI & Digital Field Surveys', 92, 80, 'low'),
(8, 1, 'Survey Sampling Design', 70, 80, 'medium'),
(8, 2, 'GIS & Remote Sensing in Surveys', 46, 75, 'high');

-- =======================================================
-- 4. DIAGNOSTIC QUESTIONS BANK (32 Questions across 4 Domains)
-- =======================================================
INSERT INTO `diagnostic_questions` (`id`, `domain_id`, `difficulty`, `question_text`, `options`, `correct_option`) VALUES
-- Domain 1: Statistical & Economic Competencies
(1, 1, 'easy', 'Under the System of National Accounts (SNA 2008), what valuation principle is recommended for compiling Output in the production account?', '["Basic Prices", "Purchasers Prices", "Factor Cost", "Producers Prices without VAT"]', 0),
(2, 1, 'easy', 'In sample survey methodology, which sampling scheme ensures proportional representation of non-overlapping homogeneous sub-populations?', '["Simple Random Sampling", "Stratified Random Sampling", "Snowball Sampling", "Systematic Cluster Sampling"]', 1),
(3, 1, 'medium', 'When compiling annual Supply and Use Tables (SUT), how are Trade and Transport Margins (TTM) reconciled when valuation shifts from Basic Prices to Purchasers Prices?', '["Added to basic prices alongside net taxes on products", "Subtracted from product output and added to intermediate consumption", "Directly credited to the capital finance account", "Offset against gross fixed capital formation"]', 0),
(4, 1, 'medium', 'What is the base year currently utilized by CSO/MoSPI for the All-India Consumer Price Index (CPI-C)?', '["2004-05", "2011-12", "2015-16", "2017-18"]', 1),
(5, 1, 'hard', 'In the compilation of Gross Fixed Capital Formation (GFCF) via the Perpetual Inventory Method (PIM), what assumption is typically made regarding asset retirement distributions?', '["Linear straight-line decay with zero residual variance", "Weibull or log-normal retirement profile coupled with geometric depreciation", "Exponential instant write-off at end of design life", "Constant rate amortization without price index adjustment"]', 1),
(6, 1, 'hard', 'In quarterly GDP nowcasting, which econometric methodology is standard for synthesizing high-frequency uneven indicators with quarterly aggregates?', '["Ordinary Least Squares on annual pooled differences", "Mixed Data Sampling (MIDAS) and Dynamic Factor Models (DFM)", "Simple exponential smoothing over fiscal moving averages", "Unconstrained Vector Autoregression with static cointegration"]', 1),
(7, 1, 'medium', 'Under PLFS (Periodic Labour Force Survey), how is a person classified as employed under the Current Weekly Status (CWS)?', '["Worked for at least 1 hour on any day during the 7 days preceding the survey date", "Worked for at least 30 days during the preceding 365 days", "Engaged in economic activity for a minimum of 40 hours in the survey week", "Registered with an official employment exchange during the reference month"]', 0),
(8, 1, 'easy', 'What does the Gross Value Added (GVA) at basic prices measure when linked with GDP at market prices?', '["GDP = GVA + Product Taxes - Product Subsidies", "GDP = GVA - Production Taxes + Production Subsidies", "GDP = GVA + Import Duties only", "GDP = GVA without indirect taxes"]', 0),

-- Domain 2: Technical & Computational Skills
(9, 2, 'easy', 'In Python Pandas, which method is best suited to compute summary statistics grouped by statistical cadres and survey rounds?', '["df.aggregate_by()", "df.groupby().agg()", "df.pivot_summary()", "df.transform_group()"]', 1),
(10, 2, 'medium', 'When handling large NSS microdata files in SQL, which construct provides efficient windowed ranking of household consumption expenditure within states?', '["ROW_NUMBER() OVER (PARTITION BY state_code ORDER BY mpce DESC)", "GROUP BY state_code HAVING mpce > AVG(mpce)", "ORDER BY state_code, mpce LIMIT 100", "SELECT DISTINCT state_code, RANK(mpce)"]', 0),
(11, 2, 'medium', 'In QGIS/ISRO Bhuvan integration, what coordinate reference system (CRS) is standard for All-India thematic cartographic projections?', '["EPSG:4326 (WGS 84 Geographic) or EPSG:3857 (Web Mercator)", "EPSG:2100 (Greek Grid)", "EPSG:32643 (UTM Zone 43N only)", "EPSG:4269 (NAD83)"]', 0),
(12, 2, 'hard', 'Which scikit-learn model architecture is robust against multicollinearity when predicting crop yields from multispectral remote sensing bands?', '["Ridge Regression or ElasticNet with cross-validated penalization", "Unregularized Ordinary Least Squares (OLS)", "Gaussian Naive Bayes with uniform priors", "Single Decision Tree with infinite max_depth"]', 0),
(13, 2, 'easy', 'In R programming, which library suite is the official modern standard for data wrangling and pipe-oriented transformations?', '["tidyverse (dplyr, tidyr, purrr)", "lattice & graphics", "rJava", "MASS & survival"]', 0),
(14, 2, 'medium', 'How is missing data imputation typically executed for non-response in institutional establishment surveys like ASI?', '["Mean imputation across entire national pool", "Hot-deck imputation or Nearest-Neighbor donor within identical NIC 4-digit strata", "Dropping all incomplete survey schedules entirely", "Zero-value replacement for all monetary columns"]', 1),
(15, 2, 'hard', 'When processing gigabyte-scale satellite imagery GeoTIFFs in Python, which library enables out-of-core chunked raster computation?', '["Rasterio integrated with Dask and Xarray", "Standard PIL (Pillow)", "OpenCV without threads", "Native Python pickle module"]', 0),
(16, 2, 'medium', 'In Git version control for national statistical modeling scripts, what command creates an isolated branch for testing a new deflator algorithm?', '["git checkout -b feature/gva-deflator-v2", "git branch --commit-all", "git merge --isolated", "git clone --new-branch"]', 0),

-- Domain 3: Digital Governance & Data Policy
(17, 3, 'easy', 'Under the Digital Personal Data Protection (DPDP) Act 2023, what is an entity that determines the purpose and means of processing personal data termed?', '["Data Processor", "Data Fiduciary", "Data Principal", "Data Intermediary"]', 1),
(18, 3, 'medium', 'For national surveys collecting sensitive household financial microdata, which data anonymization technique best preserves statistical utility while preventing re-identification?', '["Simple truncation of first names only", "k-Anonymity combined with Differential Privacy perturbations or top-coding", "Storing records without passwords in public registries", "Converting names into binary strings"]', 1),
(19, 3, 'medium', 'What standard under GIGW (Guidelines for Indian Government Websites) 3.0 mandates accessibility for differently-abled citizens?', '["ISO 9001", "W3C WCAG 2.1 Level AA Compliance", "PCI-DSS Level 1", "IEEE 802.11ac"]', 1),
(20, 3, 'easy', 'What is the primary role of the Sandes mobile gateway in Government of India authentication and communication protocols?', '["Cryptographically secure sovereign instant messaging and OTP relay for officials", "Commercial social media marketing", "Third-party cloud storage gateway", "Direct biometric Aadhaar card issuance"]', 0),
(21, 3, 'hard', 'Under National Data Sharing and Accessibility Policy (NDSAP), under what conditions can non-sensitive anonymized survey data be released to academic researchers?', '["Subject to mandatory ministerial cabinet approval for each file", "As open machine-readable datasets (CSV/JSON) via official Open Government Data (OGD) platforms", "Strictly prohibited under all circumstances", "Only via physical DVD dispatch upon cash remittance"]', 1),
(22, 3, 'medium', 'What does e-HRMS 2.0 (Manav Sampada) integrate with respect to MoSPI cadre career management?', '["Electronic service book, APAR digitisation, leave encashment, and training credits sync", "Private pension mutual funds trading", "Municipal tax collection", "Vehicle toll pass validation"]', 0),
(23, 3, 'hard', 'In the context of the India Data Management Office (IDMO) framework, what is the significance of a Data Metadata Standard for statistical agencies?', '["Ensures unified data dictionaries, interoperability, and lineage across Union & State ministries", "Restricts state governments from compiling regional economic indicators", "Forces all government databases into proprietary closed formats", "Eliminates the requirement for statistical audit committees"]', 0),
(24, 3, 'easy', 'Which sovereign cloud infrastructure provides the secure hosting environment for MoSPI and NIC critical statistical repositories?', '["NIC MeghRaj Sovereign GovCloud", "Commercial AWS Public East", "Unverified on-premise personal servers", "Overseas shared hosting"]', 0),

-- Domain 4: Leadership & Behavioural
(25, 4, 'easy', 'When leading an All-India field survey enumeration team, what is the primary role of a Supervisory Statistical Officer (SSO)?', '["Conducting random inspections, validating schedule accuracy, and ensuring field protocol compliance", "Replacing local respondents with fabricated proxies", "Delaying survey dispatch until budget expiration", "Setting arbitrary interview deadlines without field training"]', 0),
(26, 4, 'medium', 'Under the National Statistical Commission (NSC) guidelines, what core principle guarantees that official statistics remain independent and credible?', '["Professional Independence, Impartiality, and Methodological Transparency", "Subordination to immediate department revenue targets", "Withholding microdata to prevent public scrutiny", "Selective dissemination of positive economic metrics only"]', 0),
(27, 4, 'medium', 'In inter-ministerial taskforces, how should statistical discrepancies between administrative data (e.g. GSTN) and survey estimates be communicated?', '["By concealing the divergence in confidential appendices", "Through transparent reconciliation notes detailing coverage differences, concepts, and scope", "By immediately halting the publication of survey results", "By adopting whichever number is politically expedient"]', 1),
(28, 4, 'hard', 'When managing cross-cadre teams across ISS, SSS, and State DES officers, what leadership model best fosters analytical modernization and technology adoption?', '["Transformational leadership with structured mentoring, peer hackathons, and TPAC continuous learning pathways", "Hierarchical punitive administration enforcing legacy paper ledgers", "Eliminating training opportunities to prioritize routine data entry", "Isolating junior officers from advanced econometric tools"]', 0),
(29, 4, 'easy', 'What is the ethical obligation of a government statistician regarding survey confidentiality under the Collection of Statistics Act 2008?', '["Individual respondent identities must never be disclosed or used for non-statistical enforcement", "Data can be shared freely with private marketing firms", "Confidentiality expires 30 days after survey publication", "Field officers may post respondent survey sheets on social media"]', 0),
(30, 4, 'medium', 'In statistical dissemination to media and general public, what represents best practice for executive leadership?', '["Publishing concise executive summaries, visual dashboards, and open datasets with methodology disclaimers", "Releasing raw unverified calculations without documentation", "Denying press briefings and technical clarifications", "Issuing statistical press notes solely in technical mathematical symbols"]', 0),
(31, 4, 'hard', 'In crisis situations where sudden exogenous shocks (e.g. pandemic) disrupt field face-to-face enumeration, how should cadre leadership respond?', '["Trigger rapid contingency protocols: deploy Computer-Assisted Telephone Interviews (CATI) and calibrate non-response weights", "Permanently cancel the statistical series for that decade", "Synthesize fake data without notifying the statistical commission", "Wait passively until normal field access is restored without taking action"]', 0),
(32, 4, 'easy', 'What DoPT platform is officially mandated for the continuous capacity building of Civil Services and Statistical Cadres under Mission Karmayogi?', '["iGOT Karmayogi Bharat Platform", "YouTube Public Learning", "Closed departmental intranet with no certifications", "Commercial third-party social media courses"]', 0);

-- =======================================================
-- 5. UNIFIED RESOURCES (Coursera / iGOT / NSSTA Fallback)
-- =======================================================
INSERT INTO `resources` (`id`, `source`, `title`, `description`, `domain_id`, `duration`, `url`, `difficulty`, `cached_at`) VALUES
(1, 'coursera', 'Modern Data Science with Python for Statistical Officers', 'Pandas, NumPy, and Statsmodels applied to large-scale PLFS & ASI microdata pipelines and imputation models.', 2, '18 Hours', 'https://www.coursera.org/learn/python-data-analysis', 2, NOW()),
(2, 'coursera', 'Geospatial Analysis & Remote Sensing with QGIS', 'Satellite imagery processing, ISRO Bhuvan integration, and spatial stratification for agricultural and land-use surveys.', 2, '14 Hours', 'https://www.coursera.org/learn/gis', 3, NOW()),
(3, 'coursera', 'Applied Machine Learning & Nowcasting in Official Statistics', 'Predictive modeling, mixed-frequency factor models (MIDAS), and high-frequency administrative data forecasting.', 2, '20 Hours', 'https://www.coursera.org/learn/machine-learning', 3, NOW()),
(4, 'igot', 'SNA 2008 National Accounts Compilation Standards', 'Comprehensive masterclass on Gross Domestic Product, Gross Value Added, and Supply-Use Tables (SUT) reconciliation.', 1, '12 Hours', 'https://igotkarmayogi.gov.in/course/sna-2008-mastery', 2, NOW()),
(5, 'igot', 'Digital Personal Data Protection (DPDP) Act 2023 for Public Servants', 'Statutory compliance, data fiduciary obligations, privacy-preserving statistical disclosures, and citizen data rights.', 3, '8 Hours', 'https://igotkarmayogi.gov.in/course/dpdp-2023-gov', 1, NOW()),
(6, 'igot', 'Sample Survey Design & Error Analysis under NSS Protocols', 'Stratification, multi-stage cluster sampling, weighting mechanisms, and non-sampling error mitigation in large surveys.', 1, '16 Hours', 'https://igotkarmayogi.gov.in/course/nss-sample-design', 2, NOW()),
(7, 'nssta', 'Residential Workshop on Supply-Use Tables (SUT) & Capital Stock', '5-Day Intensive residential executive program on Perpetual Inventory Method (PIM) and macroeconomic balancing.', 1, '35 Hours', 'https://nssta.gov.in/programmes/tpac-sut-2025', 3, NOW()),
(8, 'nssta', 'Advanced Geospatial Integration & Bhuvan Platform for NSS 80th Round', 'Executive hands-on lab on satellite frame geo-referencing, QGIS micro-spatial validation, and CAPI mapping.', 2, '25 Hours', 'https://nssta.gov.in/programmes/tpac-gis-80th', 3, NOW()),
(9, 'nssta', 'Cadre Leadership, Data Governance & Public Policy Dissemination', 'Executive masterclass for Senior Selection Grade ISS and Joint Directors on inter-ministerial dissemination.', 4, '20 Hours', 'https://nssta.gov.in/programmes/tpac-leadership-2025', 2, NOW()),
(10, 'openlibrary', 'Principles of Modern Sample Survey Design and Analysis', 'Theoretical fundamentals of finite population sampling, estimation techniques, and variance calibration.', 1, '10 Hours', 'https://openlibrary.org/search?q=sample+survey+design', 1, NOW()),
(11, 'openlibrary', 'Econometric Nowcasting and High-Frequency Economic Indicators', 'Reference guide to state-space models, Kalman filtering, and mixed-data sampling in macro statistics.', 2, '12 Hours', 'https://openlibrary.org/search?q=econometric+nowcasting', 3, NOW()),
(12, 'coursera', 'SQL for Enterprise Data Engineering & Microdata Systems', 'Relational database design, window functions, and indexing strategies for handling census and survey databases.', 2, '15 Hours', 'https://www.coursera.org/learn/sql-for-data-science', 1, NOW()),
(13, 'igot', 'Civil Services Governance & Digital Public Infrastructure (DPI)', 'Architectures of Aadhaar, DigiLocker, UPI, and unified API exchanges within government workflow ecosystems.', 3, '10 Hours', 'https://igotkarmayogi.gov.in/course/dpi-governance', 1, NOW()),
(14, 'nssta', 'Price Statistics, Index Numbers & Deflators in National Accounts', 'Methodology of CPI, WPI, and Producer Price Index compilation and deflation in services sectors.', 1, '30 Hours', 'https://nssta.gov.in/programmes/tpac-prices-2025', 2, NOW()),
(15, 'coursera', 'R for Official Statistics and Survey Data Analysis', 'Survey package in R, complex survey design variance estimation, and automated reproducible reporting with Quarto.', 2, '16 Hours', 'https://www.coursera.org/learn/r-programming', 2, NOW()),
(16, 'igot', 'Statistical Ethics & The Collection of Statistics Act 2008', 'Legal frameworks for data collection, respondent confidentiality, and penal provisions in official surveys.', 4, '6 Hours', 'https://igotkarmayogi.gov.in/course/statistical-ethics-act', 1, NOW());

-- =======================================================
-- 6. NOMINATIONS
-- =======================================================
INSERT INTO `nominations` (`user_id`, `resource_id`, `status`, `nominated_at`) VALUES
(2, 7, 'confirmed', '2025-08-14 10:30:00'),
(2, 8, 'pending', '2025-09-01 14:15:00'),
(2, 1, 'pending', '2025-09-10 09:45:00'),
(3, 4, 'confirmed', '2025-08-20 11:00:00'),
(4, 8, 'pending', '2025-09-05 16:30:00');

-- =======================================================
-- 7. CERTIFICATIONS (Dr. Rajesh Sharma, ISS)
-- =======================================================
INSERT INTO `certifications` (`user_id`, `title`, `domain_id`, `issuing_authority`, `issued_date`, `cert_hash`, `digilocker_linked`) VALUES
(2, 'Mastery in National Accounts (SNA 2008)', 1, 'NSSTA Apex Examination Council', '2024-10-14', '9e4fc83a71b2d3e4f5a601829c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a9b0c1d', 1),
(2, 'Supply-Use Tables (SUT) Specialist', 1, 'NSSTA Academy Board', '2024-06-20', '8f3e2d1c0b9a8f7e6d5c4b3a2f1e0d9c8b7a6f5e4d3c2b1a0f9e8d7c6b5a4f3e', 1),
(2, 'Statistical Survey Sampling & Estimation Expert', 1, 'Indian Statistical Institute & MoSPI', '2023-11-18', '7a6b5c4d3e2f1a0b9c8d7e6f5a4b3c2d1e0f9a8b7c6d5e4f3a2b1c0d9e8f7a6b', 1),
(2, 'Digital Governance & DPDP Act Compliance', 3, 'DoPT Mission Karmayogi Bharat', '2024-03-25', '6b5a4f3e2d1c0b9a8f7e6d5c4b3a2f1e0d9c8b7a6f5e4d3c2b1a0f9e8d7c6b5a', 1),
(2, 'Python Data Analysis for Official Statistics', 2, 'Coursera & NSSTA Joint Faculty', '2024-12-05', '5c4b3a2f1e0d9c8b7a6f5e4d3c2b1a0f9e8d7c6b5a4f3e2d1c0b9a8f7e6d5c4b', 0);

-- =======================================================
-- 8. COMPETENCY PROGRESS (Quarterly Progression for Dashboard SVG)
-- =======================================================
INSERT INTO `competency_progress` (`user_id`, `domain_id`, `score`, `quarter`, `recorded_at`) VALUES
(2, NULL, 58, 'Q1 2024', '2024-03-31 18:00:00'),
(2, NULL, 62, 'Q2 2024', '2024-06-30 18:00:00'),
(2, NULL, 65, 'Q3 2024', '2024-09-30 18:00:00'),
(2, NULL, 68, 'Q4 2024', '2024-12-31 18:00:00'),
(2, NULL, 74, 'CURRENT (Q1 25)', '2025-03-15 18:00:00');

-- =======================================================
-- 9. DIAGNOSTIC SESSIONS & RESPONSES
-- =======================================================
INSERT INTO `diagnostic_sessions` (`id`, `user_id`, `domain_id`, `question_ids`, `started_at`, `completed_at`, `final_score`) VALUES
(1, 2, 1, '[1, 2, 3, 4, 5, 6, 7, 8]', '2025-02-24 11:00:00', '2025-02-24 11:34:12', 86);

INSERT INTO `diagnostic_responses` (`user_id`, `question_id`, `session_id`, `selected_option`, `is_correct`, `taken_at`) VALUES
(2, 1, 1, 0, 1, '2025-02-24 11:04:00'),
(2, 2, 1, 1, 1, '2025-02-24 11:08:00'),
(2, 3, 1, 0, 1, '2025-02-24 11:13:00'),
(2, 4, 1, 1, 1, '2025-02-24 11:17:00'),
(2, 5, 1, 1, 1, '2025-02-24 11:22:00'),
(2, 6, 1, 0, 0, '2025-02-24 11:27:00'), -- Incorrect
(2, 7, 1, 0, 1, '2025-02-24 11:30:00'),
(2, 8, 1, 0, 1, '2025-02-24 11:33:00');

-- =======================================================
-- 10. SELF-DECLARED SKILLS (Demonstrates comparison on Competency Profile)
-- Note: Scores here are out of 5 (1=Fundamental, 5=Master Mentor).
-- In the UI, 5 stars = 100%, 4 stars = 80%, 3 stars = 60%, 2 stars = 40%, 1 star = 20%.
-- These intentionally vary from diagnostic scores to demonstrate real side-by-side comparison!
-- =======================================================
INSERT INTO `self_declared_skills` (`user_id`, `skill_name`, `domain_id`, `claimed_level`, `declared_at`) VALUES
(2, 'National Accounts (SNA 2008)', 1, 5, NOW()),
(2, 'Survey Sampling Design', 1, 4, NOW()),
(2, 'Price Indices (CPI/WPI)', 1, 4, NOW()),
(2, 'SDG National Framework', 1, 3, NOW()),
(2, 'SQL for Microdata Analysis', 2, 4, NOW()),
(2, 'R / R-Shiny Studio', 2, 3, NOW()),
(2, 'Python Data Stack (Pandas/NumPy)', 2, 2, NOW()),
(2, 'GIS & Remote Sensing in Surveys', 2, 1, NOW()),
(2, 'Machine Learning & Nowcasting', 2, 2, NOW()),
(2, 'DPDP Act & Digital Privacy', 3, 4, NOW()),
(2, 'Govt Cloud & DPI Integration', 3, 3, NOW()),
(2, 'Cadre Leadership & Ethics', 4, 4, NOW()),
(2, 'Statistical Dissemination & Policy', 4, 3, NOW());
