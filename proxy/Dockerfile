FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Install dnsmasq, python, nodejs
RUN                                              \
  add-apt-repository -y ppa:chris-lea/node.js && \
  apt-get update --fix-missing                && \
  apt-get install -y                             \
          dnsmasq                                \
          python2.7                              \
          python-openssl                         \
          nodejs
RUN npm install -g node-gyp

# Install proxify
RUN cd /app && git clone https://github.com/suderman/proxify.git 
RUN cd /app/proxify && npm install
RUN ln -s /app/proxify/bin/proxify /bin/proxify

# Install nginx
RUN                                              \
  add-apt-repository -y ppa:nginx/stable      && \
  apt-get update  --fix-missing               && \
  apt-get install -y nginx                    && \
  chown -R www-data:www-data /var/lib/nginx

# Define mountable directories.
VOLUME ["/app/var", "/data"]

# Add dnsmasq configuration file
ADD ./dnsmasq.conf /app/dnsmasq.conf
ADD ./dnsmasq.hosts /app/dnsmasq.hosts
ADD ./dnsmasq.ethers /app/dnsmasq.ethers
RUN ln -f /app/dnsmasq.ethers /etc/ethers

# Add nginx config 
ADD ./nginx.conf /app/nginx.conf

# Error pages
RUN                                                                       \
  git clone https://github.com/janoszen/errorpages.git /tmp/errorpages && \
  cp -r /tmp/errorpages/http-errors /app/error
ADD ./error.proxy /app/error.proxy

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
