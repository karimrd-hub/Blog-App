# Blog Application (The Knowledge Vault)

A modern web application for creating and managing blog posts. This platform allows users to write, publish, and share their thoughts while providing comprehensive administrative capabilities for content and user management.

## Features

- User authentication and authorization system
- Create, edit, and delete blog posts
- Featured posts highlighting
- Category management
- Responsive design for mobile and desktop
- Complete user management system (Admin can add/edit/delete users)
- Image upload for posts and user avatars
- Rich post formatting
- Category-based post filtering

## Technologies Used

- Frontend:
  - HTML5
  - CSS3
  - JavaScript
  - Google Fonts
  - Iconscout for icons
- Backend:
  - PHP 8.2
  - MySQL Database
- Additional Tools:
  - XAMPP/Apache Server

## Installation

1. Clone the repository
```bash
git clone <repository-url>
cd Blog-App
```

2. Database Setup
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'Blog');
```

3. Configure Web Server
```php
define('ROOT_URL', 'http://your-domain/blog-app/');
```

## Directory Structure

```
├── admin/          # Admin dashboard and management
├── config/         # Configuration files
├── css/           # Stylesheets
├── images/        # Uploaded images
├── js/            # JavaScript files
├── partials/      # Reusable PHP components
└── blog.sql       # Database structure and initial data
```

## Features in Detail

### User Management
- Complete user administration (Add/Edit/Delete users)
- User registration with avatar upload
- Role-based access (Admin/Author)
- Secure authentication system

### Post Management
- Create and edit posts with rich text
- Featured post selection
- Image thumbnail upload
- Category assignment

### Category System
- Create and manage post categories
- Category-based post filtering
- Category quick links

## Contributing

Pull requests are welcome. For major changes, please open an issue first.

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Authors

Ali Jaber

Karim Ramadan

Mohamad Hussein

## Acknowledgments

- Icons provided by [Iconscout](https://iconscout.com)
- Fonts by [Google Fonts](https://fonts.google.com)

