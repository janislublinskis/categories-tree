Categories Tree Form

Project Prerequisites:

PHP v7.1<br>
ext php-mysql<br>
mysql v8.*<br>
Medoo: https://packagist.org/packages/catfan/medoo<br>
Fast Route: https://packagist.org/packages/nikic/fast-route<br>
Assert: https://packagist.org/packages/webmozart/assert<br>

**Project setup:**

**1. Clone GitHub repo for this project locally**

**Note:** Make sure you have git installed locally on your computer first.
In your terminal go to folder, where you wish to clone this project,
then enter command 'git clone https://github.com/underch3/categories-tree'

**2. in terminal cd into categories-tree**

**3. Install Composer Dependencies**
```
With command 'composer install'
```
**4. Fill config/database.php with required info**<br>
**5. Execute sql files from /config/sql folder**

Pre-made user in sql file users.sql:
email: admin@sokapp
password: Aa_00000

Or use tables structures and then fill info manually.
It’s not a bad idea to check your database to make sure everything migrated the way you expected.

**EXTRAS**

**I. If you want to use Register User and Reset Password features**

Change creditentials in RegistrationController.php and PasswordController.php to your SMTP Settings in Mailtrap.io
(For example choose Laravel as Integrations and you will see
MAIL_USERNAME=d0ca269bd39eff
MAIL_PASSWORD=0e97dd2dec24f5)

$mail->Username = 'MAIL_USERNAME';
$mail->Password = 'MAIL_PASSWORD';


Registration / login form, where the user can enter an email (as login), username and password.

After sign up - confirmation email is sent “Welcome, <username>”.

After login - session is saved(i.e. refreshing browser or opening same site in new tab will keep you signed in).
Session time can be set up in config/app.php file.

Forgot password functionality -  User is able to enter email and receive a password reset link.
The link is valid for 60 minutes.
Only the last reset link will be working (if resetting password multiple times)

**That is all you need to get started on a project.**
