FROM ubuntu:trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Set the locale
RUN locale-gen en_US.UTF-8  
ENV LANG en_US.UTF-8  
ENV LANGUAGE en_US:en  
ENV LC_ALL en_US.UTF-8  

# Expand the sources list
RUN rm /etc/apt/sources.list
ADD ./sources.list /etc/apt/sources.list

# Update everything
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update --fix-missing
RUN apt-get --assume-yes dist-upgrade

# Include a few basics
RUN apt-get install -y             \
  language-pack-en-base            \
  software-properties-common       \
  build-essential                  \
  git                              \
  zip                              \
  curl                             \
  wget                             \
  nano                             \
  vim
RUN dpkg-reconfigure locales
RUN apt-get clean

# # Install dotfiles
# RUN git clone https://github.com/suderman/local.git /home/.local
# RUN git clone https://github.com/zsh-users/antigen.git /home/.antigen
# RUN git clone https://github.com/robbyrussell/oh-my-zsh.git /home/.oh-my-zsh
#
# # Install RCM
# RUN add-apt-repository -y ppa:martin-frost/thoughtbot-rcm && \
#     apt-get update && apt-get install rcm                 && \
#     ln -sf /home/.local/dotfiles/rcrc /home/.rcrc         && \ 
#     /usr/bin/rcup

# Add data user with specific uid/gid 
# (don't forget a matching user/group on the host)
RUN useradd --home-dir /app --shell /bin/bash data
RUN usermod -p data data && usermod -U data
RUN usermod -u 2000 data && groupmod -g 2000 data

# Set TERM environment variable
ENV TERM xterm-256color

# Make config directory
RUN mkdir -p /app/var
ENV HOME /app
