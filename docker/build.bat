@echo off
docker run --rm -it -v %cd%/../:/var/www/html montebal/laradev:php80-2204 -c "bash"
