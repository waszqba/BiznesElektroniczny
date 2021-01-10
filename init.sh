#!/usr/bin/env bash

RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

mkdir shop/img
mkdir db
cp -u resources/img/* shop/img/
echo -e "${RED}Wait till the database import is finished, then do:${NC}"
echo "rm -rf shop/admin shop/install"
echo "cp -u scrapping/*.csv shop/admin024olpraq/import/"
sleep 10
docker-compose up
rm -rf shop/admin shop/install
cp -u scrapping/*.csv shop/admin024olpraq/import/
echo -e "${GREEN}Initialization complete, let the game begin...${NC}"
