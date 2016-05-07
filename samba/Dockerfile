FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var", "/data"]

# Install dependencies
RUN                                \
  apt-get update --fix-missing  && \
  apt-get install -y               \
          avahi-daemon             \
          avahi-utils              \
          libnss-mdns              \
          libcups2                 \
          samba                    \
          samba-common

# Add data as samba user, password: data
RUN (echo data; echo data) | smbpasswd -a data -s

# Add configuration
ADD	./smb.conf /app/smb.conf
ADD	./samba.service /app/samba.service
ADD	./avahi-daemon.conf /app/avahi-daemon.conf

# Add files
ADD ./bashrc /app/.bashrc 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose ports
EXPOSE 445/tcp
EXPOSE 139/tcp
EXPOSE 135/tcp
EXPOSE 137/udp
EXPOSE 138/udp
