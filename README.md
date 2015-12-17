#### Install composer
```
$ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer --version=1.0.0-alpha11

$ composer global require "fxp/composer-asset-plugin:*"

$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['*'],
];


$ php yii migrate --migrationPath=@yii/rbac/migrations

```
#### Server information
* Nginx
* HHVM
* Redis
* MySQL

#### Example config virtual host in Nginx Server

```bash

server {
	set $ROOT /home/sieulog/Web;
	listen 80;
	root $ROOT;
	index index.html index.htm index.php;
	server_name localhost;
	include hhvm.conf;
	location / {
		root $ROOT/frontend/web;
		try_files $uri /frontend/web/index.php?$args;
	}

	location ~* \.(htaccess|htpasswd|svn|git) {
		deny all;
	}

	location /admin {
		alias $ROOT/backend/web;
		try_files $uri /backend/web/index.php?$args;
	}
}

```

#### Example config virtual host in Apache Server

```bash

<VirtualHost *:80>
	ServerName localhost
	DocumentRoot "/home/sieulog/Web"
	<Directory "/home/sieulog/Web">
		AllowOverride all
        Order allow,deny
        Allow from all
		Require all granted
	</Directory>
</VirtualHost>

```

#### Initial Yii2

```bash

$ php init

```

#### Generate i18n

```bash

$ php yii message/extract @common/config/i18n.php
```