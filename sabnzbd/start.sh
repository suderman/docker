#!/bin/bash
source /config.sh

# Start the service
/usr/bin/sabnzbdplus        \
  --daemon                  \
  --config-file /config     \
  --server :8080

# Tail the logs and keep the container alive
sleep 5
tail -F /config/logs/sabnzbd.*
