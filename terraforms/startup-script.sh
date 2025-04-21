#!/bin/bash
apt-get update -y

apt-get install ca-certificates curl -y
install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/debian/gpg -o /etc/apt/keyrings/docker.asc
chmod a+r /etc/apt/keyrings/docker.asc

echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/debian \
  $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
  tee /etc/apt/sources.list.d/docker.list > /dev/null

apt-get update -y

apt-get -y install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

docker run -d \
  --name redis \
  -p 6379:6379 \
  redis:8.0-rc1 \
  --requirepass ""

docker run -d \
  --name mariadb \
  -e MARIADB_ROOT_PASSWORD=laravel \
  -e MARIADB_USER=laravel \
  -e MARIADB_PASSWORD=laravel \
  -e MARIADB_DATABASE=laravel \
  -v laravel:/var/lib/mysql \
  -p 3306:3306 \
  mariadb:11.8.1-rc
