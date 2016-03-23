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

# Add config
ADD ./my.cnf /app/my.cnf

# Backup database every every day at 3:15am
ADD ./mysqldump /app/mysqldump
RUN chmod a+x /app/mysqldump
RUN (crontab -l; echo '15  3  *  *  * /app/mysqldump >> /dev/null 2>&1';) | crontab -

# Restart MySQL with new CRL every day at 3:30am
ADD ./mysqlcrl /app/mysqlcrl
RUN chmod a+x /app/mysqlcrl
RUN (crontab -l; echo '30  3  *  *  * /app/mysqlcrl >> /dev/null 2>&1';) | crontab -

# Add files 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose ports
EXPOSE 3306/tcp
