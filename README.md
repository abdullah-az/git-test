"# git-test"

## Overview

This project is a web-based interactive platform designed to assist engineering students in preparing for the national unified exam. It leverages AI to generate new questions similar to past exam questions and provides detailed explanations to enhance the learning experience.

## Setup Instructions

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/abdullah-az/git-test.git
   cd git-test
   ```

2. **Install Dependencies:**
   Ensure you have Composer installed, then run:
   ```bash
   composer install
   ```

3. **Environment Setup:**
   Copy the `.env.example` to `.env` and configure your database and API keys:
   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seed Database:**
   ```bash
   php artisan migrate --seed
   ```

6. **Start the Development Server:**
   ```bash
   php artisan serve
   ```

## Usage Guidelines

- Access the application at `http://localhost:8000`.
- Use the interface to generate new questions and view explanations.
- Navigate through different subjects and years to practice various questions.
- Feedback and progress tracking features are available to enhance the learning experience.

