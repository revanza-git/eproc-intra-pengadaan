# 🏛️ E-Procurement Intra System

[![PHP Version](https://img.shields.io/badge/PHP-5.6-blue.svg)](https://php.net)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.x-orange.svg)](https://codeigniter.com)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-green.svg)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

A comprehensive web-based **Electronic Procurement System** built with CodeIgniter 3 framework, designed for managing the entire procurement lifecycle from planning to execution. This system provides admin-only access for internal procurement management.

## 🌟 Features

### 📋 **Planning Module (Main App)**
- **Dashboard** - Central overview of procurement activities
- **Master Data Management** - Users, currency exchange rates, vendor data
- **Perencanaan (Planning)** - Procurement planning and recapitulation
- **FPPBJ Forms** - Form Penetapan Penyedia Barang/Jasa
- **FKPBJ Forms** - Form Komite Penetapan Barang/Jasa
- **Pemaketan** - Procurement packaging and grouping
- **Timeline & Calendar** - Schedule tracking and management
- **Data Export** - Excel and PDF generation capabilities

### 🏢 **Procurement Module (Pengadaan App)**
- **Procurement Execution** - Active procurement process management
- **Vendor Management** - Vendor assessment and evaluation
- **Contract Management** - Contract lifecycle management
- **Assessment Tools** - Vendor evaluation and scoring
- **Auction Management** - Electronic auction functionality
- **Feedback System** - Vendor and procurement feedback
- **History & Audit Trail** - Complete procurement history tracking

### 🔐 **Security & Authentication**
- **Admin-Only Access** - Restricted to administrative users only
- **VMS Integration** - Integration with Vendor Management System
- **Role-Based Access Control** - Different admin role permissions
- **Session Management** - Secure session handling
- **Activity Logging** - Complete user activity tracking

## 🛠️ Technical Stack

- **Backend**: PHP 5.6 / CodeIgniter 3.x
- **Frontend**: HTML5, CSS3, JavaScript, jQuery
- **Database**: MySQL 5.7+
- **Document Generation**: DOMPDF, PHPExcel
- **UI Components**: Bootstrap, FontAwesome, DataTables
- **Charts**: HighCharts, Chart.js
- **Calendar**: FullCalendar
- **Other**: jQuery UI, DatePicker, TimePicker

## 📋 Prerequisites

Before installation, ensure you have:

- **Web Server**: Apache, Nginx, or IIS with URL rewriting enabled
- **PHP 5.6**: Use the specific distribution at `C:\tools\php56` on Windows
- **MySQL 5.7.44+**: Database server (default setup uses Docker on `localhost:3307`)
- **Composer**: For dependency management (optional)
- **Git**: For version control

## 🚀 Installation

### 1. **Clone Repository**
```bash
git clone https://github.com/revanza-git/eproc-intra-pengadaan.git
cd eproc-intra-pengadaan
```

### 2. **Web Server Configuration**

#### Apache (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

#### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php$is_args$args;
}
```

### 3. **Database Setup**

#### Create Databases
```sql
CREATE DATABASE eproc_perencanaan CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE eproc_pengadaan CHARACTER SET utf8 COLLATE utf8_general_ci;
```

#### Default Database Configuration
```php
// main/application/config/database.php
$db['default'] = array(
    'hostname' => '127.0.0.1',
    'port'     => '3307',
    'username' => 'root',
    'password' => 'Nusantara1234',
    'database' => 'eproc_perencanaan',
    'dbdriver' => 'mysqli',
    // ... other settings
);
```

### 4. **Application Configuration**

#### Set Base URLs
```php
// main/application/config/config.php
$config['base_url'] = 'http://local.eproc.intra.com/main/';
$config['pengadaan_url'] = 'http://local.eproc.intra.com/pengadaan/';
$config['vms_url'] = 'http://local.eproc.vms.com/';
```

### 5. **File Permissions**
```bash
# Linux/Mac
chmod -R 755 main/application/cache/
chmod -R 755 main/application/logs/
chmod -R 755 pengadaan/application/cache/
chmod -R 755 pengadaan/application/logs/

# Windows
# Ensure IIS_IUSRS has write permissions to cache and logs directories
```

## 🌐 Application URLs

- **Main Planning App**: `http://local.eproc.intra.com/main/`
- **Procurement App**: `http://local.eproc.intra.com/pengadaan/`
- **VMS Integration**: `http://local.eproc.vms.com/`

## 👥 Default Admin Account

For development/testing purposes:

- **Username**: `admin`
- **Password**: `admin123`
- **Role**: Super Administrator
- **Access**: Full system access

> ⚠️ **Security Note**: Change default credentials in production environment

## 📁 Directory Structure

```
eproc-intra-pengadaan/
├── main/                           # Main planning application
│   ├── application/               
│   │   ├── controllers/           # Application controllers
│   │   ├── models/               # Data models
│   │   ├── views/                # View templates
│   │   ├── config/               # Configuration files
│   │   ├── libraries/            # Custom libraries
│   │   └── helpers/              # Helper functions
│   ├── assets/                   # Frontend assets
│   │   ├── css/                  # Stylesheets
│   │   ├── js/                   # JavaScript files
│   │   ├── images/               # Image assets
│   │   └── font/                 # Font files
│   ├── system/                   # CodeIgniter framework
│   └── vendor/                   # Composer dependencies
├── pengadaan/                     # Procurement execution application
│   ├── application/
│   │   └── modules/              # HMVC modules
│   │       ├── admin/            # Admin module
│   │       ├── pengadaan/        # Procurement module
│   │       ├── vendor/           # Vendor module
│   │       └── ...               # Other modules
│   ├── assets/                   # Frontend assets
│   └── system/                   # CodeIgniter framework
├── logs/                         # Application logs
└── README.md                     # This file
```

## 🔧 Development Setup

### Enable Error Logging
```php
// Add to main/index.php
require_once(__DIR__ . '/../enable_error_logging.php');
```

### View Error Logs
Access: `http://local.eproc.intra.com/error_logger.php`

### Test Login (Development Only)
Access: `http://local.eproc.intra.com/main/test_login`

## 📊 Key Modules

### Planning (Perencanaan)
- **Form FPPBJ**: Penetapan Penyedia Barang/Jasa
- **Form FKPBJ**: Komite Penetapan Barang/Jasa
- **Pemaketan**: Package grouping and management
- **Master Data**: Currency, users, divisions

### Procurement (Pengadaan)
- **Vendor Management**: Registration, assessment, blacklist
- **Auction System**: Electronic bidding process
- **Contract Management**: Contract lifecycle
- **Evaluation**: Vendor and proposal assessment

## 🔌 API Integration

The system integrates with:
- **VMS (Vendor Management System)**: External vendor authentication
- **Key-Value Store**: Inter-application communication
- **Export Services**: Document generation services

## 📱 Browser Support

- **Chrome** 60+
- **Firefox** 55+
- **Safari** 10+
- **Edge** 40+
- **Internet Explorer** 11+

## 🧪 Testing

### Admin Test Login
```php
// Access test login interface
http://local.eproc.intra.com/main/test_login

// Direct admin login
http://local.eproc.intra.com/main/test_login/direct_admin_login
```

### Database Testing
```sql
-- Check admin user
SELECT * FROM ms_admin WHERE name = 'admin';

-- Check login credentials
SELECT * FROM ms_login WHERE username = 'admin';
```

## 🔒 Security Considerations

1. **Admin-Only Access**: System restricts access to admin users only
2. **VMS Integration**: Production authentication through VMS system
3. **Session Security**: Secure session management and validation
4. **Input Validation**: Form validation and data sanitization
5. **SQL Injection Prevention**: Parameterized queries throughout
6. **XSS Protection**: Output escaping and input filtering

## 📈 Performance

- **Caching**: Database query caching enabled
- **Asset Optimization**: Minified CSS/JS files
- **Database Indexing**: Optimized database queries
- **Session Management**: Efficient session handling

## 🛠️ Maintenance

### Log Management
- **Auto Cleanup**: Logs older than 30 days auto-deleted
- **File Rotation**: Daily log file rotation
- **Performance Tracking**: Execution time and memory monitoring

### Database Maintenance
```sql
-- Regular maintenance queries
OPTIMIZE TABLE ms_admin;
OPTIMIZE TABLE ms_login;
OPTIMIZE TABLE tr_log_activity;
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support and questions:
- **Documentation**: Check inline code documentation
- **Issues**: Create GitHub issues for bugs
- **Development**: Follow CodeIgniter 3 best practices

---

**Note**: This system is designed for internal procurement management with admin-only access. All authentication in production should go through the proper VMS system integration. 