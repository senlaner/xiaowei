@servers(['web' => 'root@123.56.107.73'])

@macro('deploy')
    master
    composer
    migrate
@endmacro

@task('code')
	echo "code task ================="
    cd /home/wwwroot/xiaowei
	git fetch && git checkout $1 && git reset --hard && git pull origin {{ isset($branch) ? $branch : "master" }}
@endtask

@task('master')
	echo "master task ================="
    cd /home/wwwroot/xiaowei
	git fetch && git checkout $1 && git reset --hard && git pull origin master
@endtask

@task('migrate')
	echo "migrate task ================="
	cd /home/wwwroot/xiaowei
    php artisan migrate
@endtask

@task('composer')
	echo "master task ================="
    cd /home/wwwroot/xiaowei
    composer install --prefer-dist --no-dev --no-scripts
@endtask