#!/usr/bin/env bash

mkdir shop/img
mkdir db
cp -u resources/img/* shop/img/
echo "Wait till the database import is finished, then do:"
echo "rm -rf shop/admin shop/install"
echo "cp -u scrapping/*.csv shop/admin024olpraq/import/"
sleep 10
docker-compose up
rm -rf shop/admin shop/install
cp -u scrapping/*.csv shop/admin024olpraq/import/
echo "Initialization complete, let the game begin..."
