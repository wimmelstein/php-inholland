FROM mysql:latest

ENV MYSQL_DATABASE users
ENV MYSQL_ROOT_PASSWORD 123456

COPY ./sql-scripts/ /docker-entrypoint-initdb.d/