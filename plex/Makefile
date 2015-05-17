# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/plex
CONTAINER=plex

all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container:
	mkdir -p $(DATA)/library;          \
	mkdir -p $(DATA)/media;            \
	docker run                         \
	--detach                           \
	--net host                         \
	--name $(CONTAINER)                \
	--volume $(shell pwd)/var:/app/var \
	--volume $(DATA)/library:/library  \
	--volume $(DATA)/media:/media      \
	$(IMAGE)
