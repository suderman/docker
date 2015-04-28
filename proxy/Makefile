# 2015 Jon Suderman
# https://github.com/suderman/docker
IMAGE=suderman/nginx
CONTAINER=nginx

all:
	@echo "image container setup nginx dnsmasq proxy"

# Build the image from the Dockerfile
image:
	docker build --tag $(IMAGE) .

# Create a new detached container from the image
container: setup
	docker run                             \
	--detach                               \
	--name $(CONTAINER)                    \
	--publish 80:80                        \
	--publish 8000:8000                    \
	--publish 443:443                      \
	--publish 4430:4430                    \
	--env DOMAIN="$(DOMAIN)"               \
	--env SERVER="$(SERVER)"               \
	--env GATEWAY="$(GATEWAY)"             \
	--env CA="$(CA)"                       \
	--volume $(shell pwd)/var:/app/var     \
	--volume $(DATA):/data                 \
	$(IMAGE)

setup: nginx dnsmasq proxy

# Copy all nginx config files to this directory's var
nginx:
	rm -rf ./var/nginx && mkdir -p ./var/nginx;                      \
	for config in $$(find .. -maxdepth 2 -name "nginx.*.conf"); do   \
		cp -f $$config ./var/nginx;                                    \
	done;

# Copy all dnsmasq config files to this directory's var
dnsmasq:
	rm -rf ./var/dnsmasq && mkdir -p ./var/dnsmasq;                  \
	for config in $$(find .. -maxdepth 2 -name "dnsmasq.*.conf"); do \
		cp -f $$config ./var/dnsmasq;                                  \
	done;

# Copy all proxy config files to this directory's var
proxy:
	rm -rf ./var/proxy && mkdir -p ./var/proxy;                      \
	for config in $$(find .. -maxdepth 2 -name "*.proxy"); do        \
		cp -f $$config ./var/proxy;                                    \
	done;
