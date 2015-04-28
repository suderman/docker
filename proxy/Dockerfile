FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Install Nginx.
RUN                                            \
  add-apt-repository -y ppa:nginx/stable    && \
  apt-get update  --fix-missing             && \
  apt-get install -y nginx                  && \
  chown -R www-data:www-data /var/lib/nginx

# Define mountable directories.
VOLUME ["/app/var", "/data"]

# Define working directory.
WORKDIR /etc/nginx

# Add files 
ADD ./nginx.conf /app/nginx.conf
ADD ./proxy_params.conf /app/proxy_params.conf
ADD ./verify_client.conf /app/verify_client.conf
ADD ./start /app/start
RUN chmod a+x /app/start

# Error pages
RUN                                                                       \
  git clone https://github.com/janoszen/errorpages.git /tmp/errorpages && \
  cp -r /tmp/errorpages/http-errors /app/error

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
