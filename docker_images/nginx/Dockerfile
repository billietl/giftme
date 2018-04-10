FROM node:9 as builder
RUN mkdir /app
WORKDIR /app
COPY code /app/
RUN npm install
RUN npm run production

FROM nginx:alpine
COPY docker_images/nginx/site.conf /etc/nginx/conf.d/default.conf
RUN mkdir -p /app/public
COPY --from=builder /app/public /app/public
