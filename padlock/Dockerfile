FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var"]

# Install tools
RUN                                                       \
  add-apt-repository -y ppa:chris-lea/node.js          && \
  apt-get update --fix-missing                         && \
  apt-get install -y                                      \
          python2.7                                       \
          python-openssl                                  \
          openvpn                                         \
          nodejs
RUN npm install -g node-gyp

# Install application
RUN git clone https://github.com/suderman/padlock.git /app/padlock && \
    cd /app/padlock                                                && \
    npm install

# Store files in volume
RUN ln -sf /app/var /app/padlock/ca 

# Add files
ADD ./bashrc /app/.bashrc 
ADD ./env /app/padlock/.env
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# HTTPS web gui
EXPOSE 11443/tcp

# HTTP web gui
EXPOSE 11180/tcp

# OCSP responder
EXPOSE 11188/tcp
