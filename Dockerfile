FROM alpine:latest

RUN apk update && apk add apache2 php8-apache2
RUN sed -i 's/^#\(LoadModule rewrite_module.*\)$/\1/' /etc/apache2/httpd.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/httpd.conf
RUN echo "CustomLog /dev/stdout common" >> /etc/apache2/httpd.conf
RUN echo "ErrorLog /dev/stderr" >> /etc/apache2/httpd.conf

COPY ./src /var/www/localhost/htdocs
RUN rm /var/www/localhost/htdocs/index.html
WORKDIR /var/www/localhost/htdocs

EXPOSE 80

CMD ["httpd","-D","FOREGROUND"]

