# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/padlock
CONTAINER=padlock

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
	--env DOMAIN="$(DOMAIN)"            \
	--publish 11443:11443               \
	--publish 11180:11180               \
	--publish 11188:11188               \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)
