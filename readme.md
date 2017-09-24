# DZ Teste Quiz #


Utilizado Framework CodeIgniter

### Instalação padrão
Faça o clone do projeto dentro do www/htdocs do seu apache:
``` ssh
$ git clone https://github.com/pezzetti/dz.git 
```
Importe *dz.sql* que se encontra dentro da raiz do projeto para o seu MySql.

Altere as configurações em *application/config/database.php*:
Exemplo:
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
### Utilizando o projeto
Após a preparação de ambiente, e de clonar o projeto, o mesmo estará disponível em  em [http://localhost/dz](http://localhost/dz) .

##### Acesso ao painel administrativo
Para visualizar o painel de cadastro de quiz acesse [http://localhost/dz/index.php/admin](http://localhost/dz/index.php/admin)

Usuário e senha para acesso ao painel de administração:
``` php
login: admin
password: admin
```



