#!/usr/bin/env bash

if [[ ! -d /srv/node_module ]]; then
  npm install /srv
fi

npm run build:dev /srv
