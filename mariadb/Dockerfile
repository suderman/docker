FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var"]

# Install MariaDB
RUN                                                                                                                            \
  apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 0xcbcb082a1bb943db                                           && \
  echo "deb http://mariadb.mirror.iweb.com/repo/10.0/ubuntu `lsb_release -cs` main" > /etc/apt/sources.list.d/mariadb.list  && \
  apt-get update --fix-missing                                                                                              && \
  apt-get install -y mariadb-server

# Add config & link to where it's expected
ADD ./my.cnf /app/my.cnf
RUN ln -f /app/my.cnf /etc/mysql/my.cnf

# Add cron job & link to where it's expected
ADD ./mysqldump /app/mysqldump
RUN chmod a+x /app/mysqldump
RUN ln -f /app/mysqldump /etc/cron.daily/mysqldump

# Add start file 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose ports
EXPOSE 3306/tcp
