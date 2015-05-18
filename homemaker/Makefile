# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/homemaker
CONTAINER=homemaker

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
	--env SERVER="$(SERVER)"            \
	--env LOGIN="$(LOGIN)"              \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)
