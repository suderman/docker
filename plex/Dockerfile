FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var", "/library", "/media"]

# Install tools and dependencies
RUN apt-get update --fix-missing
RUN apt-get install -y avahi-daemon avahi-utils unzip

# Download deb and install
RUN curl https://downloads.plex.tv/plex-media-server/0.9.12.13.1464-4ccd2ca/plexmediaserver_0.9.12.13.1464-4ccd2ca_amd64.deb -o /tmp/plex.deb
RUN dpkg -i /tmp/plex.deb
RUN apt-get -yf install

# Add files 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose ports
EXPOSE 32400/tcp
EXPOSE 32443/tcp
EXPOSE 1900/udp
EXPOSE 32410/udp
EXPOSE 32412/udp
EXPOSE 32413/udp
EXPOSE 32414/udp
EXPOSE 32469/tcp
