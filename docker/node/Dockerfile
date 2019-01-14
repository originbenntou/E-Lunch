FROM node:latest

WORKDIR /E-lunch

CMD cd E-Pantry \
    && npm install \
    && npm run build:dev

CMD cd E-Serve \
    && npm install \
    && npm run build:dev
