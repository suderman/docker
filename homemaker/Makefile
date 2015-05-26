# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/homemaker
CONTAINER=homemaker
DEPENDENCIES=padlock,mariadb

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container:
	docker run                          \
	--detach                            \
	--name $(CONTAINER)                 \
	--hostname $(CONTAINER)             \
	--publish 7000:7000                 \
	--publish 7001:7001                 \
	--env DOMAIN="$(DOMAIN)"            \
	--env SERVER="$(SERVER)"            \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)
