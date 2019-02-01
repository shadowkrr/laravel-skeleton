# 必要となるパッケージをインストール
```
sudo yum -y install zlib-devel bzip2-devel openssl-devel ncurses-devel sqlite-devel readline-devel tk-devel gcc;
```

# scl-utilsをインストール (remiレポジトリでインストールする時に必要)
```
sudo rpm -Uvh ftp://ftp.scientificlinux.org/linux/scientific/6.4/x86_64/updates/fastbugs/scl-utils-20120927-8.el6.x86_64.rpm
```

# php71
```
sudo yum -y install php71
sudo yum -y install php71-pdo
sudo yum -y install php71-php-pdo
sudo yum -y install php71-php-devel
sudo yum -y install php71-mbstring
sudo yum -y install php71-php-mbstring
sudo yum -y install php71-php-mcrypt
sudo yum -y install php71-php-gd
sudo yum -y install php71-php-xml
sudo yum -y install php71-php-mysqlnd
sudo yum install --enablerepo=remi-php71 php-mysqlnd
```

# composer
```
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
composer install
```


# キー情報を生成(App/配下で実行する)
```
php artisan key:generate
```

# License
Laravel is open-sourced software licensed under the MIT License.
