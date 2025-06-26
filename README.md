# Teja's Task Manager

A modern, responsive task management application built with Laravel 9 and Bootstrap 5, featuring a Kanban-style interface with drag-and-drop functionality.

## 🚀 Live Demo
[Project URL: http://localhost:8000](http://localhost:8000)

## ✨ Features

### Core Functionality
- **User Authentication** - Secure login/registration system
- **Task Management** - Create, edit, delete, and organize tasks
- **Kanban Board** - Visual task organization with drag-and-drop
- **Real-time Updates** - Instant status changes without page refresh
- **Responsive Design** - Works perfectly on desktop, tablet, and mobile

### Modern UI/UX
- **Glassmorphism Design** - Modern glass-like interface
- **Bootstrap 5** - Latest responsive framework
- **SweetAlert2** - Beautiful confirmation dialogs
- **Bootstrap Icons** - Consistent iconography
- **SortableJS** - Smooth drag-and-drop functionality

### Security Features
- **CSRF Protection** - Cross-site request forgery prevention
- **Input Validation** - Comprehensive data validation
- **SQL Injection Prevention** - Secure database queries
- **Session Management** - Secure user sessions

## 🛠️ Technology Stack

### Backend
- **Laravel 9** - PHP web framework
- **PHP 8.1+** - Server-side programming
- **MySQL** - Database management
- **Composer** - Dependency management

### Frontend
- **Bootstrap 5** - CSS framework
- **JavaScript (ES6+)** - Client-side programming
- **SweetAlert2** - Alert and confirmation dialogs
- **SortableJS** - Drag-and-drop library
- **Bootstrap Icons** - Icon library

### Development Tools
- **Vite** - Asset compilation
- **NPM** - Package management
- **Git** - Version control

## 📋 Requirements

- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer
- Node.js 16 or higher
- NPM

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone [repository-url]
cd task-manager
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Database Configuration
Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Database Migrations
```bash
php artisan migrate
```

### 7. Build Assets
```bash
npm run build
```

### 8. Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## 📱 Usage

### Getting Started
1. **Register** - Create a new account
2. **Login** - Access your task dashboard
3. **Create Tasks** - Add new tasks using the "Add Task" button
4. **Organize** - Drag and drop tasks between columns
5. **Manage** - Edit or delete tasks as needed

### Task Management
- **To Do** - Tasks that need to be started
- **In Progress** - Tasks currently being worked on
- **Done** - Completed tasks

### Features
- **Drag & Drop** - Move tasks between columns
- **Real-time Updates** - Changes save automatically
- **Responsive Design** - Works on all devices
- **Modern UI** - Beautiful glassmorphism design

## 🏗️ Project Structure

```
task-manager/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/             # Eloquent models
│   └── Providers/          # Service providers
├── database/
│   ├── migrations/         # Database schema
│   └── seeders/           # Data seeders
├── resources/
│   ├── views/             # Blade templates
│   ├── css/               # Stylesheets
│   └── js/                # JavaScript files
├── routes/                # Route definitions
└── public/                # Public assets
```

## 🔧 Configuration

### Environment Variables
Key configuration options in `.env`:
```env
APP_NAME="Teja's Task Manager"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

### Customization
- **Colors** - Modify CSS variables in `resources/css/app.css`
- **Icons** - Replace Bootstrap Icons with custom icons
- **Layout** - Customize Blade templates in `resources/views/`

## 🧪 Testing

### Run Tests
```bash
php artisan test
```

### Test Coverage
- Unit tests for models and controllers
- Feature tests for user workflows
- Browser tests for UI interactions

## 📊 Performance

### Optimization Features
- **Asset Compilation** - Vite-based build process
- **CDN Integration** - Fast loading external libraries
- **Database Indexing** - Optimized queries
- **Caching** - Route and view caching

### Performance Metrics
- Page load time: < 2 seconds
- Database queries: Optimized with eager loading
- Asset loading: CDN and minification

## 🔒 Security

### Security Measures
- **CSRF Protection** - All forms protected
- **Input Validation** - Comprehensive validation rules
- **SQL Injection Prevention** - Eloquent ORM
- **XSS Protection** - Blade template escaping
- **Authentication** - Laravel Breeze security

## 📈 Future Enhancements

### Planned Features
- [ ] Task priorities and due dates
- [ ] Team collaboration features
- [ ] File attachments
- [ ] Email notifications
- [ ] Dark mode theme
- [ ] Mobile app development
- [ ] API for external integrations
- [ ] Advanced reporting and analytics

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests for new functionality
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 👨‍💻 Author

**Teja** - Full Stack Developer

## 📞 Support

For support and questions:
- Create an issue in the repository
- Contact: [your-email@example.com]

## 🙏 Acknowledgments

- Laravel team for the amazing framework
- Bootstrap team for the responsive framework
- SweetAlert2 for beautiful alerts
- SortableJS for drag-and-drop functionality

---

**Version:** 1.0.0  
**Last Updated:** June 26, 2025  
**Status:** Production Ready
