FROM nginx:latest
COPY ./default.conf /etc/nginx/conf.d/default.conf
COPY ./index.html /usr/share/nginx/html/index.html
RUN apt update
RUN apt install sqlite3 -y
