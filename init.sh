#!/usr/bin/env bash

cp resources/img/* shop/img
cp resoruces/modules.ps_banner.img shop/modules/ps_banner/img
cp resoruces/modules.ps_imageslider.images shop/modules/ps_imageslider/images
docker-compose up -d
echo "Check for shop/install directory. When created, delete it"
