# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/btsync
CONTAINER=btsync
DEPENDENCIES=

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
	--publish 8888:8888                 \
	--publish 55555:55555               \
	--volume $(shell pwd)/var:/app/var  \
	--volume $(DATA):/data              \
	$(IMAGE)
