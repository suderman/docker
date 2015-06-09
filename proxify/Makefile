# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/proxify
CONTAINER=proxify
DEPENDENCIES=padlock,openvpn

all:
	@echo "image container setup nginx dnsmasq proxify"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container: setup
	docker run                             \
	--detach                               \
	--net host 										         \
	--name $(CONTAINER)                    \
	--publish 80:80                        \
	--publish 8000:8000                    \
	--publish 443:443                      \
	--publish 4430:4430                    \
	--publish 53:53 	                     \
	--publish 53:53/udp                    \
	--env DOMAIN="$(DOMAIN)"               \
	--env SERVER="$(SERVER)"               \
	--env PASSWORDS="$(PASSWORDS)"         \
	--env DNSIMPLE="$(DNSIMPLE)"           \
	--volume $(shell pwd)/var:/app/var     \
	--volume $(DATA):/data                 \
	$(IMAGE)

setup: nginx dnsmasq proxify

# Copy all nginx config files to this directory's var
nginx:
	rm -rf ./var/nginx && mkdir -p ./var/nginx;                      \
	for config in $$(find .. -maxdepth 2 -name "*.nginx.conf"); do   \
		cp -f $$config ./var/nginx;                                    \
	done;

# Copy all dnsmasq config files to this directory's var
dnsmasq:
	rm -rf ./var/dnsmasq && mkdir -p ./var/dnsmasq;                  \
	for config in $$(find .. -maxdepth 2 -name "*.dnsmasq.conf"); do \
		cp -f $$config ./var/dnsmasq;                                  \
	done;

# Copy all proxify config files to this directory's var
proxify:
	rm -rf ./var/proxify && mkdir -p ./var/proxify;                  \
	for config in $$(find .. -maxdepth 2 -name "*.proxify"); do      \
		cp -f $$config ./var/proxify;                                  \
	done;
