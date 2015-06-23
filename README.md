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

### Configure networking  

This setup requires a static IP and a bridge network interface. Copy and
paste the following into `/etc/network/interfaces` adjusting the primary
network interface (em1), the server's IP address (10.0.0.2) and the 
gateway's IP address (10.0.0.1) as necessary:  

```
# The loopback network interface
auto lo
iface lo inet loopback

# The bridge network interface
auto br0
iface br0 inet static
  address 10.0.0.2
  netmask 255.255.255.0
  network 10.0.0.0
  broadcast 10.0.0.255
  gateway 10.0.0.1
  dns-nameservers 10.0.0.2 8.8.8.8 8.8.4.4
  bridge_ports em1
  bridge_fd 9
  bridge_hello 2
  bridge_maxage 12
  bridge_stp off

# The primary network interface
auto em1
iface em1 inet manual
  up ip link set $IFACE up promisc on
  down ip link set $IFACE down promisc off
```

Before rebooting, make sure to allow IP forwarding:  

```
sudo echo 'net.ipv4.ip_forward=1' >> /etc/sysctl.conf
sudo reboot now
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

# Data directory on Server
export DATA="/data"

# Comma-delimited authentication for services (username:password)
export PASSWORDS="admin:super_secr3t,guest:passw0rd"

# CloudFlare and/or DNSimple API key (email:password)
# router.domain.com should point to the router's public IP address
export CLOUDFLARE="myname@email.com:my-secr3t-passw0rd"  
export DNSIMPLE="myname@email.com:my-secr3t-passw0rd"  
```

### Services

- [padlock](https://github.com/suderman/padlock)
- [openvpn](https://openvpn.net/)
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

#### Others still to set up:
- [headphones](https://github.com/rembo10/headphones)
- [sonarr](https://sonarr.tv/)
- [nzbget](http://nzbget.net/)
- [transmission](http://www.transmissionbt.com/)
- [mpd](http://www.musicpd.org/)
- [NZBmegasearcH](http://pillone.github.io/usntssearch/)
- [Redis](http://redis.io/)
- [ZNC](https://github.com/znc/znc)
- [tmate](http://tmate.io/)
- [webdav](http://httpd.apache.org/docs/2.2/mod/mod_dav.html)

