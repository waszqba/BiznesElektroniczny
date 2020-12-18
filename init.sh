#!/usr/bin/env bash

mkdir shop/img
cp -u resources/img/* shop/img/
docker-compose up -d
sleep 15
rm -rf shop/admin shop/install
cp -u scrapping/*.csv shop/admin024olpraq/import/
echo "Initialization complete, let the game begin..."
