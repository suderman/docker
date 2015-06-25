FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var"]

# Install dependencies
RUN                               \
  apt-get update --fix-missing && \
  apt-get install -y              \
          openvpn                 \
          bridge-utils            \
          iptables

# Add files
ADD ./tun.conf /app/tun.conf
ADD ./tap.conf /app/tap.conf
ADD ./verify /app/verify
ADD ./tun /app/tun
ADD ./tap /app/tap
RUN chmod a+x /app/verify /app/tun /app/tap

# Static IP addresses
ADD ./dhcp /app/dhcp
RUN mkdir /app/tun.ccd /app/tap.ccd

# Add start script
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose port
EXPOSE 1194/udp
EXPOSE 443/tcp
