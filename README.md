KOORY - Livraison de plats Africains et exotiques
=================================================

Installation
------------
A - Sur l'environnement vagrant

    1 cloner le projet yitoo/vagrant-dev-env
    
```shell
$ git@github.com:yitoo/vagrant-dev-env.git yitoo-vagrant-dev-env
$ cd yitoo-vagrant-dev-env
$ vagrant up --provision
```

    2 cloner le projet cloner le projet koory dans le repertoire apps
    
```shell
$ git clone git@github.com:yitoo/koory.git apps/
$
```
    3 Configurer le vhost et installer les vendors
    
```shell
$ vagrant ssh
$ sudo ln -s /etc/nginx/sites-available/koory /etc/nginx/sites-enabled/koory
$ cd apps/koory
$ composer install
$ sudo service nginx restart
```

    4 Mettez à jour vos hosts
    
```shell
$ sudo vim /etc/hosts
$ 10.10.10.10   dev.yitoo.fr
```

