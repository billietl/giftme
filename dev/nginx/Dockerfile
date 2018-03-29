FROM nginx:alpine

COPY dev/nginx/site.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /app/public

COPY code/public /app/public
