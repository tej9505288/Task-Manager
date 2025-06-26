# Deployment Guide - Task Manager

## Production Deployment Instructions

### Prerequisites
- Web server (Apache/Nginx)
- PHP 8.1+
- MySQL 5.7+
- Composer
- Node.js 16+
- SSL Certificate (recommended)

### Step 1: Server Preparation

#### Install Required Software
```bash
# Ubuntu/Debian
sudo apt update
sudo apt install php8.1 php8.1-mysql php8.1-mbstring php8.1-xml php8.1-curl php8.1-zip
sudo apt install mysql-server nginx composer nodejs npm

# CentOS/RHEL
sudo yum install epel-release
sudo yum install php php-mysql php-mbstring php-xml php-curl php-zip
sudo yum install mysql-server nginx composer nodejs npm
```

### Step 2: Project Setup

#### Clone and Configure
```bash
# Clone repository
git clone [repository-url] /var/www/task-manager
cd /var/www/task-manager

# Set permissions
sudo chown -R www-data:www-data /var/www/task-manager
sudo chmod -R 755 /var/www/task-manager
sudo chmod -R 775 storage bootstrap/cache
```

#### Install Dependencies
```bash
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

### Step 3: Environment Configuration

#### Create Production Environment
```bash
cp .env.example .env
php artisan key:generate
```

#### Configure .env for Production
```env
APP_NAME="Teja's Task Manager"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=task_user
DB_PASSWORD=secure_password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

LOG_CHANNEL=stack
LOG_LEVEL=error
```

### Step 4: Database Setup

#### Create Database and User
```sql
CREATE DATABASE task_manager;
CREATE USER 'task_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON task_manager.* TO 'task_user'@'localhost';
FLUSH PRIVILEGES;
```

#### Run Migrations
```bash
php artisan migrate --force
```

### Step 5: Web Server Configuration

#### Nginx Configuration
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name yourdomain.com;
    
    ssl_certificate /path/to/certificate.crt;
    ssl_certificate_key /path/to/private.key;
    
    root /var/www/task-manager/public;
    index index.php index.html index.htm;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    location ~ /\.(?!well-known).* {
        deny all;
    }
    
    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;
}
```

#### Apache Configuration (.htaccess)
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### Step 6: Security Configuration

#### File Permissions
```bash
# Set proper permissions
sudo find /var/www/task-manager -type f -exec chmod 644 {} \;
sudo find /var/www/task-manager -type d -exec chmod 755 {} \;
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data /var/www/task-manager
```

#### Security Measures
```bash
# Disable directory listing
echo "Options -Indexes" >> /var/www/task-manager/public/.htaccess

# Protect sensitive files
echo "Deny from all" > /var/www/task-manager/.env
echo "Deny from all" > /var/www/task-manager/composer.json
echo "Deny from all" > /var/www/task-manager/composer.lock
```

### Step 7: Performance Optimization

#### Laravel Optimization
```bash
# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

#### Database Optimization
```sql
-- Add indexes for better performance
ALTER TABLE tasks ADD INDEX idx_user_status (user_id, status);
ALTER TABLE users ADD INDEX idx_email (email);
```

### Step 8: Monitoring and Maintenance

#### Log Configuration
```bash
# Set up log rotation
sudo nano /etc/logrotate.d/laravel

/var/www/task-manager/storage/logs/*.log {
    daily
    missingok
    rotate 52
    compress
    notifempty
    create 644 www-data www-data
}
```

#### Backup Strategy
```bash
#!/bin/bash
# backup.sh - Database backup script

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/var/backups/task-manager"
DB_NAME="task_manager"
DB_USER="task_user"
DB_PASS="secure_password"

# Create backup directory
mkdir -p $BACKUP_DIR

# Database backup
mysqldump -u$DB_USER -p$DB_PASS $DB_NAME > $BACKUP_DIR/db_backup_$DATE.sql

# File backup
tar -czf $BACKUP_DIR/files_backup_$DATE.tar.gz /var/www/task-manager

# Keep only last 7 days of backups
find $BACKUP_DIR -name "*.sql" -mtime +7 -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +7 -delete
```

### Step 9: SSL Certificate Setup

#### Let's Encrypt (Free SSL)
```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx

# Obtain certificate
sudo certbot --nginx -d yourdomain.com

# Auto-renewal
sudo crontab -e
# Add: 0 12 * * * /usr/bin/certbot renew --quiet
```

### Step 10: Testing Deployment

#### Health Checks
```bash
# Test database connection
php artisan tinker
DB::connection()->getPdo();

# Test application
curl -I https://yourdomain.com

# Check logs
tail -f /var/www/task-manager/storage/logs/laravel.log
```

#### Performance Testing
```bash
# Install Apache Bench
sudo apt install apache2-utils

# Test performance
ab -n 1000 -c 10 https://yourdomain.com/
```

### Troubleshooting

#### Common Issues

**1. 500 Internal Server Error**
```bash
# Check Laravel logs
tail -f storage/logs/laravel.log

# Check web server logs
tail -f /var/log/nginx/error.log
tail -f /var/log/apache2/error.log

# Check permissions
ls -la storage/
ls -la bootstrap/cache/
```

**2. Database Connection Issues**
```bash
# Test database connection
php artisan tinker
DB::connection()->getPdo();

# Check database status
sudo systemctl status mysql
```

**3. Asset Loading Issues**
```bash
# Rebuild assets
npm run build

# Check asset permissions
ls -la public/build/
```

**4. Performance Issues**
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Rebuild caches
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Maintenance Commands

#### Regular Maintenance
```bash
# Daily maintenance script
#!/bin/bash
cd /var/www/task-manager

# Clear old logs
find storage/logs -name "*.log" -mtime +30 -delete

# Optimize database
php artisan db:monitor

# Check for updates
composer outdated
npm outdated
```

#### Update Process
```bash
# Backup before update
./backup.sh

# Update code
git pull origin main

# Update dependencies
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Run migrations
php artisan migrate --force

# Clear and rebuild caches
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

**Deployment Guide Version:** 1.0  
**Last Updated:** June 26, 2025  
**Compatible with:** Laravel 9, PHP 8.1+, MySQL 5.7+ 