# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/openvpn
CONTAINER=openvpn
DEPENDENCIES=padlock

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
	--privileged                        \
	--net host                          \
	--publish 1194:1194/udp             \
	--env DOMAIN="$(DOMAIN)"            \
	--env SERVER="$(SERVER)"            \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)

# Create a new interactive container from the image
shell: 
	mkdir -p ./var/;                    \
	docker run                          \
	--rm -it                            \
	--net host                          \
	--privileged                        \
	--publish 1194:1194/udp             \
	--env DOMAIN="$(DOMAIN)"            \
	--env SERVER="$(SERVER)"            \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE) /bin/bash
