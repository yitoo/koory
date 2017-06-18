<?php
namespace Deployer;

require 'recipe/symfony3.php';

// Configuration

set('repository', 'git@github.com:yitoo/koory.git');
set('git_tty', true); // [Optional] Allocate tty for git on first deployment
add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);


// Hosts

host('recette.koory.fr')
    ->user('deployer')
    ->stage('recette')
    ->set('deploy_path', '/var/www/koory');

// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo service php7.0-fpm restart');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
//before('deploy:symlink', 'database:migrate');
