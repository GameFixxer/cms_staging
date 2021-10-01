# **CMS-Stage**

---

### Advice
Always use declare(strict_types=1); at the beginning of your files in order to not mess up with types.

### Setup project:
- please make sure you have php8
- `composer install`
- `docker-compose up -d`
- `TODO: add DB`
- Start with: `php -S localhost:8000 -t <full-path-to-your-index.php-directory>`

---

### Before pushing:
- grumphp is installed and will check if you can commit your changes

---

### Execute Commands:
- vendor/bin/psalm
- vendor/bin/codecept run
- vendor/bin/phpstan analyse <path>

---

### Database
- local database connection
  - user: babo (or root)
  - password: pass123
