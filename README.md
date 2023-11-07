<h1 align="center">Handpickd - Artisanal Marketplace</h1>

<p align="center">
    <img src="https://github.com/PaperTurtle/handpickd/assets/68080844/3a49f36e-d924-4e05-9e01-654bb12c588e" 
    width=192 height=192 alt="logo" />
</p>

> Welcome to **Handpickd**, a community-driven platform that celebrates creativity and craftsmanship. This marketplace is a school project that provides a space for artisans to showcase their handmade goods and for enthusiasts to discover unique, handcrafted items.

## 🌟 Project Overview

Handpickd offers an alternative to mass-produced goods by highlighting unique, handcrafted items. It's a digital homage to the tradition of artisanry, designed to connect makers with those who appreciate the value of bespoke creations.

## 📜 Page Breakdown

-  **Homepage**: Introduces the platform and features a search bar for finding products, along with a showcase of selected items.

-  **Login/Registration**: Allows new users to join the community and existing members to access their accounts.

-  **Post a Product**: Enables registered artisans to list new items, complete with detailed descriptions and images.

-  **Product Listings**: Displays items based on search criteria or browsing, with filters for categories and artisan location.

-  **Product Details**: Provides in-depth information about each product, including images, pricing, and artisan profiles.

-  **Artisan Profile**: Offers insights into the artisans' backgrounds, their product range, and customer reviews.

## ✨ Features & Functionality

-  **Responsive Design**: Ensures a consistent user experience across various devices.

-  **User Authentication**: Differentiates between artisan and buyer accounts for a personalized experience.

-  **Database Integration**: Maintains a secure record of products, user profiles, and transactions.

-  **Search and Filter System**: Helps users find products that match their interests.

-  **Shopping Cart & Checkout**: Allows users to reserve items they intend to purchase.

-  **User Reviews and Ratings**: Provides feedback on products and artisans, fostering a trustworthy community.

## 🛠 Technologies & Tools

### Frontend

-  **Tailwind CSS**: For modern and responsive design.
-  **Alpine.js**: For dynamic user interactions.
-  **Heroicons**: For clean and expressive icons.

### Backend

-  **Laravel**: A powerful framework for server-side logic and data management.
-  **MySQL**: For reliable data storage and retrieval.
-  **Laravel Breeze**: For secure user authentication and session management.

## 🚀 Getting Started

To run Handpickd locally, follow these instructions:

```shell
# Clone the repository
git clone https://github.com/PaperTurtle/handpickd.git

# Navigate to the repository
cd handpickd

# Install dependencies
npm install
composer install

# Set up the environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Serve the application
php artisan serve // (Terminal 1)
npm run dev // (Terminal 2)
```
