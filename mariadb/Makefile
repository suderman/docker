# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/mariadb
CONTAINER=mariadb

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container:
	mkdir -p ./var/mysql;               \
	docker run                          \
	--detach                            \
	--name $(CONTAINER)                 \
	--hostname $(CONTAINER)             \
	--publish 3306:3306                 \
	--env CA="$(CA)"                    \
	--env DOMAIN="$(DOMAIN)"            \
	--env LOGIN="$(LOGIN)"              \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)
