# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/couchpotato
CONTAINER=couchpotato
DEPENDENCIES=

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container:
	mkdir -p ./var/;                              \
	docker run                                    \
	--detach                                      \
	--name $(CONTAINER)                           \
	--hostname $(CONTAINER)                       \
	--publish 5050:5050                           \
	--volume $(shell pwd)/var:/app/var            \
	--volume $(DATA)/downloads/usenet:/downloads  \
	--volume $(DATA)/library/movies:/movies       \
	$(IMAGE)
