FROM mysql:5.7
RUN apt update &&  apt upgrade -y && apt install vim iputils-ping -y

ADD /docker/mysql/leaf_portal.sql /docker-entrypoint-initdb.d
ADD /docker/mysql/leaf_users.sql /docker-entrypoint-initdb.d

