FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var", "/data"]

# Install dependencies
RUN apt-get update --fix-missing && apt-get install -y                             \
    bzip2 apache2 sendmail-base sendmail smbclient                                 \
    fontconfig-config fonts-dejavu-core ghostscript gsfonts imagemagick-common     \
    libapache2-mod-php5 libcupsfilters1 libcupsimage2 libfftw3-double3             \
    libfontconfig1 libfreetype6 libgd3 libgs9 libgs9-common libicu52 libijs-0.35   \
    libjasper1 libjbig0 libjbig2dec0 libjpeg-turbo8 libjpeg8 liblcms2-2            \
    liblqr-1-0 libltdl7 libmagickcore5 libmagickwand5 libmcrypt4 libopts25         \
    libpaper-utils libpaper1 libpq5 libtiff5 libvpx1 libxpm4 lsof ntp              \
    php-pear php-xml-parser php5 php5-cli php5-common php5-curl php5-gd            \
    php5-imagick php5-intl php5-json php5-mcrypt php5-mysqlnd php5-pgsql           \
    php5-readline php5-sqlite php5-dev poppler-data psmisc ttf-dejavu-core         \
    libc6 libcurl3 zlib1g libpcre3-dev libreoffice-common libreoffice-writer
RUN update-rc.d sendmail defaults

# Install Owncloud
RUN git clone https://github.com/owncloud/core.git && mv core /app/owncloud
RUN cd /app/owncloud && git checkout stable9
RUN git clone https://github.com/owncloud/3rdparty.git /app/owncloud/3rdparty
RUN cd /app/owncloud/3rdparty && git checkout stable9

ADD ./autoconfig.php /app/autoconfig.php
RUN mkdir -p /app/owncloud.dist                                                 && \
    mv /app/owncloud/config /app/owncloud.dist/config                           && \
    mv /app/owncloud/apps /app/owncloud.dist/apps                               && \
    mv /app/owncloud/themes /app/owncloud.dist/themes

# Set up cron every 15 minutes, run by data
RUN (crontab -lu data; echo '*/15  *  *  *  * php -f /app/owncloud/cron.php >> /dev/null 2>&1';) | crontab -u data -

# Set up APCu
RUN pecl channel-update pecl.php.net
RUN pecl install channel://pecl.php.net/apcu-4.0.7
ADD ./apcu.ini /app/apcu.ini
RUN ln -sf /app/apcu.ini /etc/php5/mods-available/apcu.ini
RUN ln -sf /app/apcu.ini /etc/php5/apache2/conf.d/20-apcu.ini

# Set up PHP
ADD ./php.ini /app/php.ini
RUN ln -sf /app/php.ini /etc/php5/cli/php.ini
RUN ln -sf /app/php.ini /etc/php5/apache2/php.ini
RUN php5enmod mcrypt

# Set up Apache
ADD ./apache2.conf /app/apache2.conf
RUN ln -sf /app/apache2.conf /etc/apache2/apache2.conf
ADD ./envvars /app/envvars
RUN ln -sf /app/envvars /etc/apache2/envvars
RUN chown data:data /var/lock/apache2
RUN a2enmod rewrite

# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Add files 
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

EXPOSE 80/tcp
