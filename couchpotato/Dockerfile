FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var", "/downloads", "/movies"]

# Install dependencies
RUN                                \
  apt-get update --fix-missing  && \
  apt-get install -y               \
          python2.7                \
          python-openssl           \
          unrar

# Install application
RUN git clone https://github.com/RuudBurger/CouchPotatoServer.git /app/couchpotato

# Add files
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose ports.
EXPOSE 5050/tcp
