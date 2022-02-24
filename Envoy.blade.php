@servers(['production' => ['root@137.184.228.27']]);

@task('deploy', ['on' => 'production'])
 cd /var/www/html
 git pull origin main
@endtask

