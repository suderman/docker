# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/owncloud
CONTAINER=owncloud
DEPENDENCIES=padlock,mariadb

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container:
	mkdir -p ./var/;                          \
	docker run                                \
	--detach                                  \
	--name $(CONTAINER)                       \
	--hostname $(CONTAINER)                   \
	--publish 8100:80                         \
	--env DOMAIN="$(DOMAIN)"                  \
	--env SERVER="$(SERVER)"                  \
	--env PASSWORDS="$(PASSWORDS)"            \
	--volume $(shell pwd)/var:/app/var        \
	--volume $(DATA)/owncloud:/data           \
	--volume $(DATA)/downloads:/downloads     \
	--volume $(DATA)/library:/library         \
	--volume $(DATA)/media:/media             \
	$(IMAGE)
