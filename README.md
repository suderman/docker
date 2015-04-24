# Docker services for my Intel NUC

### Create data user on host
```
sudo mkdir -p /data
sudo useradd --home-dir /data --shell /bin/bash data
sudo usermod -p data data && usermod -U data
sudo usermod -u 2000 data && groupmod -g 2000 data
sudo gpasswd -a ${USER} data
```

### Install and configure docker
```
sudo curl -sSL https://get.docker.com/ | sh
sudo gpasswd -a ${USER} docker  
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

### Services

- [padlock](https://github.com/suderman/padlock)
- [dnsmasq](http://www.thekelleys.org.uk/dnsmasq/doc.html)
- [mariadb](https://mariadb.org/)
- [homemaker](https://github.com/suderman/homemaker)
- [plex](https://plex.tv/)
- [plexconnect](https://github.com/iBaa/PlexConnect)
- [btsync](https://www.getsync.com/)
- [sabnzbd](http://sabnzbd.org/)
- [couchpotato](https://couchpota.to/)
- [samba](https://www.samba.org/)
- [webdav](http://httpd.apache.org/docs/2.2/mod/mod_dav.html)
- [nginx](http://nginx.org/)

