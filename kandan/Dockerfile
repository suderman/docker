FROM suderman/trusty

MAINTAINER Jon Suderman <suderman@gmail.com>

# Define mountable directories
VOLUME ["/app/var"]

# Install dependencies
RUN apt-get update --fix-missing && \
    apt-get install -y              \
    mysql-client-core-5.5           \
    ruby1.9.1-dev                   \
    ruby-bundler                    \
    libxslt-dev                     \
    libxml2-dev                     \
    libpq-dev                       \
    libsqlite3-dev                  \
    libmysqlclient-dev              \
    gcc                             \
    g++                             \
    make                            \
    nodejs
RUN gem install execjs

# Install rails app
RUN git clone https://github.com/kandanapp/kandan.git /app/kandan
WORKDIR /app/kandan
RUN echo "gem 'mysql2'" >> Gemfile
RUN bundle install
RUN bundle exec rake assets:precompile

# Modify config
RUN sed -i "s/assets = false/assets = true/g" config/environments/production.rb

# Add files 
ADD	./database.yml /app/kandan/config/database.yml
ADD ./start /app/start
RUN chmod a+x /app/start

# Start it up
CMD ["/app/start"]

# Expose port
EXPOSE 6100/tcp
