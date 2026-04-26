# Bankku – Financial SaaS Dashboard

A production-ready Laravel 12 frontend dashboard for a financial SaaS application.

## Prerequisites
- PHP >= 8.2
- Composer
- Node.js (optional, for asset compilation)

## Quick Start

### 1. Create a new Laravel 12 project
```bash
composer create-project laravel/laravel bankku
cd bankku
```

### 2. Copy project files
Copy all files from this package into your Laravel project root, maintaining the directory structure.

### 3. No database needed
This is a frontend-only implementation. No migrations required.

### 4. Start the development server
```bash
php artisan serve
```

Visit: **http://localhost:8000**

---

## Project Structure

```
bankku/
├── routes/
│   └── web.php                          ← All application routes
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php                ← Main layout (sidebar + topbar)
│   ├── dashboard/
│   │   ├── index.blade.php              ← Dashboard overview
│   │   ├── transactions.blade.php       ← Transactions page
│   │   ├── credit-cards.blade.php       ← Credit cards page
│   │   └── placeholder.blade.php        ← Generic placeholder pages
│   ├── loans/
│   │   └── index.blade.php              ← Loans page
│   └── settings/
│       └── index.blade.php              ← Settings with 3 tabs
```

## Available Routes

| Route          | Page                     |
|----------------|--------------------------|
| `/`            | Redirects to dashboard   |
| `/dashboard`   | Overview with charts     |
| `/transactions`| Transaction history      |
| `/accounts`    | Accounts (placeholder)   |
| `/investments` | Investments (placeholder)|
| `/credit-cards`| Credit cards management  |
| `/loans`       | Active loans overview    |
| `/services`    | Services (placeholder)   |
| `/settings`    | Settings (3 tabs)        |

## Design System

- **Font**: Plus Jakarta Sans (Google Fonts)
- **Primary**: `#2563EB` (Blue 600)
- **Background**: `#F5F7FA`
- **Cards**: White with soft shadow, 20px border radius
- **Charts**: ApexCharts (CDN)
- **Icons**: Inline SVG (no icon font dependency)
- **CSS**: Tailwind CSS (CDN)

## Features Implemented

### Dashboard
- My Cards – animated credit cards with gradient backgrounds
- Weekly Activity – grouped bar chart (deposits vs withdrawals)
- Expense Statistics – donut chart with percentages
- Balance History – area line chart
- Quick Transfer – horizontal avatar carousel + amount input
- Recent Transactions – live mock data with colored icons
- Key Metrics – 4 cards (Balance, Income, Expense, Savings)

### Loans
- 4 loan category summary cards
- Full active loans table with status chips
- Totals row

### Settings
- **Edit Profile** tab – form with avatar upload button
- **Preferences** tab – timezone/currency selects + notification toggles
- **Security** tab – 2FA toggle + password change form

### Credit Cards
- 3 card display
- Monthly spending bar chart
- Card details panel
- Quick action buttons

### Transactions
- Search + filter controls
- Full transaction table with category chips
- Pagination component

## Customization

### Mock data
All data is defined inline in each Blade view using PHP arrays. To update:
- Edit the `@php` blocks in each view file
- No database changes needed

### Adding real data
To connect to a backend:
1. Create Eloquent models and migrations
2. Pass data from controllers instead of view-level `@php` blocks
3. Replace mock arrays with model queries

### Charts (ApexCharts)
Chart configuration is in `@push('scripts')` at the bottom of each view.
Modify the `series.data` arrays to update displayed values.
