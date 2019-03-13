FROM ubuntu
# prevent tzdata from prompting for user input
ENV DEBIAN_FRONTEND=noninteractive
# tell laravel to run in development
ENV APP_ENV=development
# use sqlite for development
ENV DB_CONNECTION=sqlite

RUN apt update
RUN apt install php7.2-common php7.2-cli php7.2-gd php7.2-mysql php7.2-sqlite3 php7.2-curl php7.2-intl php7.2-mbstring php7.2-bcmath php7.2-imap php7.2-xml php7.2-zip curl -y
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /recipes_app
WORKDIR /recipes_app
COPY ./Backend .
RUN chmod -R 777 storage && chmod -R 777 bootstrap/cache
RUN composer install
# example .env file can't exist along another .env file
RUN rm .env.example
# create new .env file
RUN touch .env && echo "APP_KEY=" >> .env
# manually create database
RUN touch database/database.sqlite
RUN php artisan key:generate
RUN php artisan migrate

EXPOSE 8000
ENTRYPOINT ["php", "artisan", "serve", "--host", "0.0.0.0"]