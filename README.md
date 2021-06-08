# User login/signup app using PHP

### To run locally:

- Run MYSQL server
```bash
sudo systemctl start mysql.service
```

- Run app with Apache
```bash
cd /var/www/html
git clone https://github.com/bia-wtag/user-app.git
cd user-app
composer install
```
- Create a `.env` file with proper credentiatls of mysql server following `.env.example` format.
- Go to localhost/user-app in the browser.