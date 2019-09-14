FROM mysql:5.7

COPY ./docker/mysql/init/* /docker-entrypoint-initdb.d/

RUN chown -R mysql /var/lib/mysql && \
    chgrp -R mysql /var/lib/mysql
