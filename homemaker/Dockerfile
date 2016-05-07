FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var"]

# Install tools
RUN                                                       \
  add-apt-repository -y ppa:chris-lea/node.js          && \
  apt-get update --fix-missing                         && \
  apt-get install -y                                      \
          mysql-client-core-5.5                           \
          python2.7                                       \
          python-openssl                                  \
          nodejs
RUN npm install -g node-gyp

# Install application
RUN git clone https://github.com/suderman/homemaker.git /app/homemaker && \
    cd /app/homemaker                                                  && \
    npm install                                                        && \
    npm run symlink                                                    && \
    npm run build

# Add files
ADD ./env /app/homemaker/.env
ADD ./bashrc /app/.bashrc 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose ports
EXPOSE 7000/tcp
EXPOSE 7001/tcp
