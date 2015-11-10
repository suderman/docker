# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/dovecot
CONTAINER=dovecot
DEPENDENCIES=padlock

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
	--publish 26:25                     \
	--publish 587:587                   \
	--publish 143:143                   \
	--env DOMAIN="$(DOMAIN)"            \
	--env SERVER="$(SERVER)"            \
	--env PASSWORDS="$(PASSWORDS)"      \
	--volume $(shell pwd)/var:/app/var  \
	$(IMAGE)
