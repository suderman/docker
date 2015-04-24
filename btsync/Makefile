# 2015 Jon Suderman
# https://github.com/suderman/local
all:
	@echo "image container"

# Build the image from the Dockerfile
image:
	docker build --tag suderman/btsync2 .

# Create a new detached container from the image
container: 
	docker run                          \
	--detach                            \
	--name btsync2                      \
	--publish 8889:8888								  \
	--publish 55556:55555							  \
	--volume $(shell pwd)/var:/app/var  \
	--volume ${DATA}:/data              \
	suderman/btsync2
