# syntax=docker/dockerfile:1
FROM montebal/laradev:php80-2204-v1 as dev


COPY ../vendor /var/www/html/vendor
COPY ../docker/vendor/setasign/setapdf-core/library/SetaPDF/Core/Document/Page/Annotation /var/www/html/vendor/setasign/setapdf-core/library/SetaPDF/Core/Document/Page/Annotation

RUN git config --global --add safe.directory /var/www/html
RUN git config --global core.autocrlf true
RUN git config --global pull.rebase false
RUN git config --global pull.twohead recursive
RUN git config --global credential.helper store

# ssl
#RUN a2enmod ssl
#COPY ./docker/thesite.conf /etc/apache2/sites-available/
#COPY ./docker/certificates/apache-certificate.crt /etc/apache2/certificate/
#COPY ./docker/certificates/apache.key /etc/apache2/certificate/