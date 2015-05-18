FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var"]

# Install dependencies
RUN                               \
  apt-get update --fix-missing && \
  apt-get install -y              \
          python2.7               \
          python-openssl

# Install application
RUN git clone https://github.com/iBaa/PlexConnect.git /app/plexconnect
ADD ./Settings.cfg /app/plexconnect/Settings.cfg

# Add files
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose port
EXPOSE 32480/tcp
