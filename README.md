# Eye-Invest: Financial Tracking Tool

## Overview
**Eye-Invest** helps users monitor their income and expenses, providing insights into their financial habits. By tracking weekly, monthly, and daily expenses, the system tells users if they're on track for financial freedom or need to save more. It also includes an **admin section** for better management.

## Features
- **User Dashboard**: Track salary, expenses, and savings.
- **Expense Categories**: Weekly, monthly, and daily expenses tracking.
- **Financial Insights**: Get recommendations on improving savings.
- **Admin Section**: Manage users and view statistics.

## Tech Stack
- **Backend**: Laravel
- **Database**: MySQL
- **Frontend**: Tailwind CSS, HTML5, CSS, JavaScript, Blade Templates
- **Local Development**: XAMPP

## Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/Benz-19/eye-Invest.git
    ```
2. Navigate into the project folder:
    ```bash
    cd eye-Invest
    ```
3. Install dependencies:
    ```bash
    composer install
    npm install
    ```
4. Set up your `.env` file and database configuration.
5. Run migrations to set up the database:
    ```bash
    php artisan migrate
    ```
6. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage
- Register and log in to start tracking your expenses.
- Access the admin section to manage users and data.

## License
This project is open-source and available under the MIT License.
