# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/plexconnect
CONTAINER=plexconnect
DEPENDENCIES=plex

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container: 
	mkdir -p ./var/;                    \
	docker run                          \
	--detach                            \
	--name $(CONTAINER)                 \
	--hostname $(CONTAINER)             \
	--publish 32480:32480	              \
	--env SERVER="$(SERVER)"            \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)
