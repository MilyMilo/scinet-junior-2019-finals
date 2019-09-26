FROM php:7.3-apache

RUN useradd -s /bin/bash -m kurisuhaito && \
    useradd -s /bin/bash -m takeru && \
    useradd -s /bin/bash -m nakanishi && \
    apt-get update && \
    apt-get install vim nano python python3 netcat -y

COPY --chown=kurisuhaito:kurisuhaito users/kurisuhaito/* /home/kurisuhaito/
COPY --chown=takeru:takeru users/takeru/* /home/takeru/

COPY web /var/www/html/
COPY web/000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY web/ports.conf /etc/apache2/ports.conf

RUN chmod 744 /home/kurisuhaito/* && \ 
    chmod 744 /home/takeru/* && \
    chown -R www-data:www-data /var/www/html

EXPOSE 80 65000

USER nakanishi