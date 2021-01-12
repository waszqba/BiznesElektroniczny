#!/usr/bin/env bash

RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

mkdir shop/img
mkdir db
cp -u resources/img/* shop/img/
echo -e "\n${RED}Wait till the database import is finished, press ^C\n\n${NC}"
sleep 10
docker-compose up
docker-compose up -d
sleep 15
rm -rf shop/admin shop/install
cp -u scrapping/*.csv shop/admin024olpraq/import/
echo -e "\n${GREEN}Initialization complete, let the game begin...${NC}"
