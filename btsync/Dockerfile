FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var", "/data"]

# Install btsync
RUN curl https://download-cdn.getsyncapp.com/stable/linux-x64/BitTorrent-Sync_x64.tar.gz -o /usr/bin/btsync.tar.gz
RUN cd /usr/bin && tar -xzvf btsync.tar.gz && rm btsync.tar.gz 

# Add files 
ADD	./btsync.conf /app/btsync.conf
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Web GUI
EXPOSE 8888/tcp

# Listening port
EXPOSE 55555/tcp
