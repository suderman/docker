FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var", "/downloads" "/library"]

RUN                                                                      \
  apt-get update                                                      && \
  apt-get install -y                                                     \
          sabnzbdplus                                                    \
          sabnzbdplus-theme-classic                                      \
          sabnzbdplus-theme-mobile                                       \
          sabnzbdplus-theme-plush                                        \
          par2                                                           \
          python-yenc                                                    \
          unrar                                                          \
          unzip                                                          

# Add files 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up 
CMD ["/app/start"]

# Expose ports
EXPOSE 8080/tcp
EXPOSE 9090/tcp
