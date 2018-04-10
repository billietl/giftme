#!/bin/bash

docker build -f ../docker_images/nginx/Dockerfile -t louisbilliet/giftme_nginx:dev ..
docker build -f ../docker_images/node/Dockerfile -t louisbilliet/giftme_node:dev ..
docker build -f ../docker_images/php/Dockerfile -t louisbilliet/giftme_php:dev ..
