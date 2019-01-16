#!/usr/bin/env bash

if [[ ! -d /srv/node_module ]]; then
  npm install /srv
fi

cd /srv
npm run build:dev
