# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/kandan
CONTAINER=kandan

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
	--publish 6100:6100                 \
	--env SERVER="$(SERVER)"            \
	--env LOGIN="$(LOGIN)"              \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)
