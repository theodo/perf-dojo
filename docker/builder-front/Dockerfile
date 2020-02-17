FROM node:13.8.0-alpine3.10

WORKDIR /var/www/

COPY package.json yarn.lock *.config.js ./
RUN yarn

COPY templates templates/
COPY public public/

RUN yarn build
