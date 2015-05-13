# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/sabnzbd
CONTAINER=sabnzbd

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container: 
	mkdir -p ./var/;                             \
	docker run                                   \
	--detach                                     \
	--name $(CONTAINER)                          \
	--hostname $(CONTAINER)                      \
	--publish 8080:8080                          \
	--publish 9090:9090                          \
	--volume $(shell pwd)/var:/app/var           \
	--volume $(DATA)/downloads/usenet:/downloads \
	--volume $(DATA)/library:/library            \
	$(IMAGE)
