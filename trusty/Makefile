# 2015 Jon Suderman
# https://github.com/suderman/local
all: 
	@echo "image container"

# Build the image from the Dockerfile
image:	
	docker build --tag suderman/trusty .

# Create a new interactive container from the image
container: 
	docker run                   \
	--rm -it                     \
	--volume ${DATA}:/data       \
	suderman/trusty /bin/bash
