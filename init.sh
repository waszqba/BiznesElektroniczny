#!/usr/bin/env bash

mkdir shop/img
cp resources/img/* shop/img/
docker-compose up -d
sleep 15
rm -rf shop/admin
rm -rf shop/install
echo "Initialization complete, have fun with prestaCrap!"
