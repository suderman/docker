# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/trusty
CONTAINER=trusty

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new interactive container from the image
shell: 
	docker run                   \
	--rm -it                     \
	--net host                   \
	--privileged                 \
	--volume $(DATA):/data       \
	$(IMAGE) /bin/bash
