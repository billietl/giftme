FROM node:9
RUN mkdir /app
WORKDIR /app
COPY code/package.json /app/package.json
RUN npm install
CMD [ "npm", "run", "watch" ]
