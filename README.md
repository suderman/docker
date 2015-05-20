# Docker services for my Intel NUC

### Create data user/group on host
```
sudo useradd -mU -s /bin/bash -u 2000 data
sudo passwd data
sudo gpasswd -a $USER data  
```

### Install and configure docker
```
sudo curl -sSL https://get.docker.com/ | sh
sudo gpasswd -a $USER docker  
sudo cp -f ~/.local/ubuntu/etc/default-docker /etc/default/docker  
sudo service docker restart  
```

### Configure firewall
```
sudo cp -f ~/.local/ubuntu/etc/default-ufw /etc/default/ufw  
sudo ufw reload  
sudo ufw allow 4243/tcp  
```

### Install this repo
```
git clone git@github.com:suderman/docker.git $HOME/docker
export PATH="$PATH:$HOME/docker/bin"
```

### Expected Environment Variables

```
# Server's domain name (all services are subdomains off this)  
export DOMAIN="domain.com"  

# Server IP Address  
export SERVER="10.0.0.2"  

# Server's router IP Address
export GATEWAY="10.0.0.1"

# Certificate Authority URL on Server
export CA="http://10.0.0.2:11443"

# Comma-delimited authentication for services (username:password)
export PASSWORDS="admin:super_secr3t,guest:passw0rd"

# DNSimple API key (email:password)
# router.domain.com should point to the router's public IP address
export DNSIMPLE="myname@email.com:my-secr3t-passw0rd"  

# Data directory on Server
export DATA="/data"
```

### Services

- [padlock](https://github.com/suderman/padlock)
- [proxify](https://github.com/suderman/proxify)
  - [nginx](http://nginx.org/)
  - [dnsmasq](http://www.thekelleys.org.uk/dnsmasq/doc.html)
- [mariadb](https://mariadb.org/)
- [homemaker](https://github.com/suderman/homemaker)
- [kandan](http://http://getkandan.com/)
- [plex](https://plex.tv/)
- [plexconnect](https://github.com/iBaa/PlexConnect)
- [btsync](https://www.getsync.com/)
- [sabnzbd](http://sabnzbd.org/)
- [couchpotato](https://couchpota.to/)
- [samba](https://www.samba.org/)
- [webdav](http://httpd.apache.org/docs/2.2/mod/mod_dav.html)

