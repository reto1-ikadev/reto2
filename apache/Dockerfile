FROM ubuntu:latest
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y
RUN apt install -y apache2  software-properties-common && add-apt-repository ppa:ondrej/php
RUN apt-get update -y && apt install -y php8.0 libapache2-mod-php8.0 php8.0-mysql php8.0-common
#RUN rm /var/www/html/*
#WORKDIR /var/www/html
#COPY ./pagina/ .
EXPOSE 80
ENTRYPOINT ["/usr/sbin/apachectl", "-D",  "FOREGROUND"]

