#!/bin/bash

# 🚀 SCRIPT SETUP OTOMATIS WEBSITE DESA TETEMBOMUA
# Script ini akan menginstall dan mengkonfigurasi website secara otomatis

echo "🌐 SETUP WEBSITE DESA TETEMBOMUA"
echo "=================================="

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "❌ PHP tidak ditemukan. Silakan install PHP 8.2+ terlebih dahulu."
    exit 1
fi

# Check PHP version
PHP_VERSION=$(php -r "echo PHP_VERSION;")
echo "✅ PHP Version: $PHP_VERSION"

# Check if Composer is installed
if ! command -v composer &> /dev/null; then
    echo "❌ Composer tidak ditemukan. Silakan install Composer terlebih dahulu."
    exit 1
fi

echo "✅ Composer ditemukan"

# Check if Node.js is installed
if ! command -v node &> /dev/null; then
    echo "❌ Node.js tidak ditemukan. Silakan install Node.js terlebih dahulu."
    exit 1
fi

NODE_VERSION=$(node --version)
echo "✅ Node.js Version: $NODE_VERSION"

echo ""
echo "📦 INSTALLING DEPENDENCIES..."
echo "=============================="

# Install PHP dependencies
echo "Installing PHP dependencies..."
composer install --no-interaction

# Install Node.js dependencies
echo "Installing Node.js dependencies..."
npm install

echo ""
echo "⚙️ CONFIGURING ENVIRONMENT..."
echo "=============================="

# Copy environment file if not exists
if [ ! -f .env ]; then
    echo "Creating .env file..."
    cp .env.example .env
    echo "✅ .env file created"
else
    echo "✅ .env file already exists"
fi

# Generate application key
echo "Generating application key..."
php artisan key:generate --no-interaction

echo ""
echo "🗄️ SETTING UP DATABASE..."
echo "=========================="

# Ask for database configuration
echo "Konfigurasi Database:"
read -p "Database name (default: desa_tetembomua): " DB_NAME
DB_NAME=${DB_NAME:-desa_tetembomua}

read -p "Database username (default: root): " DB_USER
DB_USER=${DB_USER:-root}

read -s -p "Database password: " DB_PASS
echo ""

# Update .env file with database configuration
sed -i "s/DB_DATABASE=.*/DB_DATABASE=$DB_NAME/" .env
sed -i "s/DB_USERNAME=.*/DB_USERNAME=$DB_USER/" .env
sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$DB_PASS/" .env

echo "✅ Database configuration updated"

# Run migrations
echo "Running database migrations..."
php artisan migrate --no-interaction

# Create storage link
echo "Creating storage link..."
php artisan storage:link

echo ""
echo "🏗️ BUILDING ASSETS..."
echo "====================="

# Build assets
echo "Building frontend assets..."
npm run build

echo ""
echo "👤 CREATING ADMIN USER..."
echo "========================="

# Create admin user
echo "Creating admin user..."
php artisan tinker --execute="
use App\Models\User;
User::create([
    'name' => 'Administrator',
    'email' => 'admin@desatetembomua.com',
    'password' => bcrypt('password123'),
    'role' => 'super_admin',
    'status' => 'active'
]);
echo 'Admin user created successfully';
"

echo ""
echo "🎉 SETUP SELESAI!"
echo "=================="
echo ""
echo "🌐 WEBSITE ACCESS:"
echo "Public Website: http://localhost:8000"
echo "Admin Panel: http://localhost:8000/admin"
echo ""
echo "🔐 ADMIN LOGIN:"
echo "Email: admin@desatetembomua.com"
echo "Password: password123"
echo ""
echo "🚀 TO START THE SERVER:"
echo "php artisan serve"
echo ""
echo "📱 TO START VITE (for development):"
echo "npm run dev"
echo ""
echo "✅ Setup completed successfully!"
