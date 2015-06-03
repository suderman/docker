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
ADD ./bridge /app/bridge
RUN chmod a+x /app/verify /app/bridge

# Add start script
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose port
EXPOSE 1194/udp
