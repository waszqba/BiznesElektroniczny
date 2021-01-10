#!/usr/bin/env bash

mkdir shop/img
mkdir db
cp -u resources/img/* shop/img/
docker-compose up -d
sleep 30
rm -rf shop/admin shop/install
cp -u scrapping/*.csv shop/admin024olpraq/import/
echo "Initialization complete, let the game begin..."
