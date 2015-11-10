# https://github.com/lava/dockermail
FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var"]

# Install tools
RUN                                                       \
  apt-get update --fix-missing                         && \
  apt-get install -y --force-yes                          \
          postfix postgrey dovecot-imapd

# Postfix configuration files
RUN cp -r /etc/postfix /app/postfix
ADD ./main.cf /app/postfix/main.cf
ADD ./master.cf /app/postfix/master.cf

# Dovecot configuration file
RUN cp -r /etc/dovecot /app/dovecot
ADD ./dovecot.conf /app/dovecot/dovecot.conf

# Add files
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose SMTP port for incoming mail
EXPOSE 25/tcp 

# Expose SMTP port for outgoing mail
EXPOSE 587/tcp

# Expose IMAP port
EXPOSE 143/tcp
