## Networking requirements  

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
