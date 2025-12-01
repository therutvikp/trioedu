# Project Overview: TrioEdu

**Version:** 9.0.3 (Estimated)
**Type:** Education Management System (School/Institute/Academy)
**Framework:** Laravel (PHP)
**Frontend:** Vue.js 2, Bootstrap 4

## Executive Summary
TrioEdu is a comprehensive Education Management System designed to handle various administrative tasks for schools, institutes, and academies. It provides a modular architecture allowing for features like student management, fees collection, examination planning, and real-time communication.

## Technology Stack

### Backend
-   **Language:** PHP 8.2+
-   **Framework:** Laravel (Likely v10/v11 based on dependencies, though [composer.json](file:///home/rutvik/Downloads/infixedu_v9.0.3/Upload/composer.json) references `^12.0` which may be a placeholder or custom fork).
-   **Modular System:** `nwidart/laravel-modules` is used to organize features into independent modules.
-   **Database:** MySQL (implied standard for Laravel).
-   **Key Libraries:**
    -   `spatie/laravel-html`, `spatie/valuestore`: Helpers and settings management.
    -   `maatwebsite/excel`: Excel import/export functionality.
    -   `barryvdh/laravel-dompdf`: PDF generation.
    -   `intervention/image`: Image processing.
    -   `pusher/pusher-php-server`: Real-time notifications and chat.
    -   `joisarjignesh/bigbluebutton`: Video conferencing integration.
    -   `stripe/stripe-php`, `omnipay/paypal`, `mercadopago/dx-php`: Payment gateway integrations.

### Frontend
-   **Framework:** Vue.js v2.6.12
-   **UI Framework:** Bootstrap v4.6.0
-   **Build Tool:** Laravel Mix (Webpack)
-   **Key Libraries:**
    -   `axios`: HTTP client.
    -   `laravel-echo`, `pusher-js`: Real-time event listening.
    -   `vue-select`, `vue2-editor`: UI components.
    -   `moment`: Date manipulation.

## Architecture & Structure

The project follows the standard Laravel directory structure with a significant addition of a **Modules** system.

### Directory Structure
-   **`app/`**: Core application logic (Models, Controllers, Providers).
-   **`Modules/`**: Contains self-contained modules for specific features.
-   **`packages/`**: Custom packages (`larabuild/pagebuilder`, `larabuild/optionbuilder`).
-   **`resources/`**: Views (Blade templates), assets (JS/Sass), and language files.
-   **`routes/`**: Application route definitions.
-   **`public/`**: Web server entry point and compiled assets.

### Key Modules (Active)
Based on [modules_statuses.json](file:///home/rutvik/Downloads/infixedu_v9.0.3/Upload/modules_statuses.json) and the `Modules/` directory:
-   **RolePermission**: User role and permission management.
-   **MenuManage**: Dynamic menu management.
-   **Lesson**: Lesson planning and management.
-   **Wallet**: Digital wallet functionality.
-   **Fees**: Fees management system.
-   **ExamPlan**: Examination scheduling and planning.
-   **Chat**: Real-time chat system.
-   **StudentAbsentNotification**: Automated notifications for student absences.
-   **BulkPrint**: Bulk printing capabilities (likely for ID cards or reports).
-   **DownloadCenter**: File management for students/teachers.
-   **TwoFactorAuth**: Security feature.
-   **BehaviourRecords**: Tracking student behavior.
-   **TemplateSettings**: Customization of templates.

### Key Modules (Inactive/Available)
-   **Saas**: Software as a Service capabilities.
-   **Zoom / Jitsi / Gmeet / BBB**: Video conferencing integrations.
-   **OnlineExam / Lms**: E-learning features.
-   **Inventory**: Asset management.
-   **Various Payment Gateways**: RazorPay, Xendit, Khalti, etc.

## Configuration
-   **Environment:** Configured via **`.env`** file.
-   **Database:** Configured in **`config/database.php`**.
-   **Services:** Third-party services (Google, Stripe, Pusher) configured in **`config/services.php`**.
