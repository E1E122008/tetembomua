@echo off
chcp 65001 >nul

echo 🌐 SETUP WEBSITE DESA TETEMBOMUA
echo ==================================

REM Check if PHP is installed
php --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ❌ PHP tidak ditemukan. Silakan install PHP 8.2+ terlebih dahulu.
    pause
    exit /b 1
)

echo ✅ PHP ditemukan

REM Check if Composer is installed
composer --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ❌ Composer tidak ditemukan. Silakan install Composer terlebih dahulu.
    pause
    exit /b 1
)

echo ✅ Composer ditemukan

REM Check if Node.js is installed
node --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ❌ Node.js tidak ditemukan. Silakan install Node.js terlebih dahulu.
    pause
    exit /b 1
)

echo ✅ Node.js ditemukan

echo.
echo 📦 INSTALLING DEPENDENCIES...
echo ==============================

REM Install PHP dependencies
echo Installing PHP dependencies...
composer install --no-interaction

REM Install Node.js dependencies
echo Installing Node.js dependencies...
npm install

echo.
echo ⚙️ CONFIGURING ENVIRONMENT...
echo ==============================

REM Copy environment file if not exists
if not exist .env (
    echo Creating .env file...
    copy .env.example .env
    echo ✅ .env file created
) else (
    echo ✅ .env file already exists
)

REM Generate application key
echo Generating application key...
php artisan key:generate --no-interaction

echo.
echo 🗄️ SETTING UP DATABASE...
echo ==========================

REM Ask for database configuration
echo Konfigurasi Database:
set /p DB_NAME="Database name (default: desa_tetembomua): "
if "%DB_NAME%"=="" set DB_NAME=desa_tetembomua

set /p DB_USER="Database username (default: root): "
if "%DB_USER%"=="" set DB_USER=root

set /p DB_PASS="Database password: "

REM Update .env file with database configuration
powershell -Command "(Get-Content .env) -replace 'DB_DATABASE=.*', 'DB_DATABASE=%DB_NAME%' | Set-Content .env"
powershell -Command "(Get-Content .env) -replace 'DB_USERNAME=.*', 'DB_USERNAME=%DB_USER%' | Set-Content .env"
powershell -Command "(Get-Content .env) -replace 'DB_PASSWORD=.*', 'DB_PASSWORD=%DB_PASS%' | Set-Content .env"

echo ✅ Database configuration updated

REM Run migrations
echo Running database migrations...
php artisan migrate --no-interaction

REM Create storage link
echo Creating storage link...
php artisan storage:link

echo.
echo 🏗️ BUILDING ASSETS...
echo =====================

REM Build assets
echo Building frontend assets...
npm run build

echo.
echo 👤 CREATING ADMIN USER...
echo =========================

REM Create admin user
echo Creating admin user...
php artisan tinker --execute="use App\Models\User; User::create(['name' => 'Administrator', 'email' => 'admin@desatetembomua.com', 'password' => bcrypt('password123'), 'role' => 'super_admin', 'status' => 'active']); echo 'Admin user created successfully';"

echo.
echo 🎉 SETUP SELESAI!
echo ==================
echo.
echo 🌐 WEBSITE ACCESS:
echo Public Website: http://localhost:8000
echo Admin Panel: http://localhost:8000/admin
echo.
echo 🔐 ADMIN LOGIN:
echo Email: admin@desatetembomua.com
echo Password: password123
echo.
echo 🚀 TO START THE SERVER:
echo php artisan serve
echo.
echo 📱 TO START VITE (for development):
echo npm run dev
echo.
echo ✅ Setup completed successfully!
pause
