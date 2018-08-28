# DZ Quiz #


Made with CodeIgniter

### How to install
Clone repository
``` ssh
$ git clone https://github.com/pezzetti/dz.git 
```
Import *dz.sql* on the root path to your MySQL database.

Change the database connection in *application/config/database.php*:
``` php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'dz',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
### How to use
Access [http://localhost/dz](http://localhost/dz) .

##### Backoffice access
To create a quiz, access [http://localhost/dz/index.php/admin](http://localhost/dz/index.php/admin)

Credentials
``` php
login: admin
password: admin
```



