# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/samba
CONTAINER=samba
DEPENDENCIES=

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container:
	docker run                          \
	--detach                            \
	--net host                          \
	--name $(CONTAINER)                 \
	--volume $(shell pwd)/var:/app/var  \
	--volume $(DATA):/data              \
	$(IMAGE)
