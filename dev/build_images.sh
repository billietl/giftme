#!/bin/bash

docker build -f ../docker_images/nginx/Dockerfile -t giftme_nginx:dev ..
docker build -f ../docker_images/node/Dockerfile -t giftme_node:dev ..
docker build -f ../docker_images/php/Dockerfile -t giftme_php:dev ..
