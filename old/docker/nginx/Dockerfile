FROM nginx:1.14.2-alpine

# nginxのインストール
RUN apk update && \
    apk add --no-cache nginx

RUN mkdir -p /run/nginx

# フォアグラウンドでnginx実行
CMD nginx -g "daemon off;"
