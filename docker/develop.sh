#!/bin/bash

#docker run -v docker start mysql
# docker run --name InventoryManager-mysql -e MYSQL_ROOT_PASSWORD=my_crazy_super_secret_root_password -e MYSQL_DATABASE=InventoryManager -e MYSQL_USER=InventoryManager -e MYSQL_PASSWORD=whateverdood -d mysql
docker run -d InventoryManager-mysql
#docker run -d -v ~/Documents/InventoryManageryhead/Inventory Manager/:/var/www/html -p $(boot2docker ip)::80   --link InventoryManager-mysql:mysql --name=InventoryManager InventoryManager
docker run --link InventoryManager-mysql:mysql -d -p 40000:80 --name=Inventory Manager -v ~/Documents/InventoryManageryhead/Inventory Manager/:/var/www/html \
-v ~/Documents/InventoryManageryhead/Inventory Manager-storage:/var/lib/InventoryManager --env-file docker.env InventoryManager-test
