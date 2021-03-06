FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories.
VOLUME ["/app/var", "/data"]

# Install python, nodejs
RUN                                              \
  add-apt-repository -y ppa:chris-lea/node.js && \
  apt-get update --fix-missing                && \
  apt-get install -y                             \
          python2.7                              \
          python-openssl                         \
          nodejs
RUN npm install -g node-gyp

# Install proxify
RUN git clone https://github.com/suderman/proxify.git /app/proxify && \
    cd /app/proxify                                                && \
    npm install                                                    && \
    ln -s /app/proxify/bin/proxify /bin/proxify

# Install dnsmasq
RUN apt-get install -y dnsmasq

# Add dnsmasq configuration files
ADD ./hosts /app/hosts
ADD ./ethers /app/ethers
RUN ln -f /app/ethers /etc/ethers

# Install nginx
RUN                                              \
  add-apt-repository -y ppa:nginx/stable      && \
  apt-get update  --fix-missing               && \
  apt-get install -y nginx                    && \
  chown -R data:data /var/lib/nginx

# Error pages
RUN                                                                       \
  git clone https://github.com/janoszen/errorpages.git /tmp/errorpages && \
  cp -r /tmp/errorpages/http-errors /app/error

# Add files 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up 
CMD ["/app/start"]

# Private HTTP
EXPOSE 80/tcp

# Private HTTPS
EXPOSE 443/tcp

# Public HTTP
EXPOSE 8000/tcp

# Public HTTPS
EXPOSE 4430/tcp

# DNS ports
EXPOSE 53/udp
EXPOSE 53/tcp
