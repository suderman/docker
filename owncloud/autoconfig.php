<?php
$AUTOCONFIG = array(
  'trusted_domains' => array ( 0 => '$SUBDOMAIN' ),
  "directory"     => "/data",
  "dbtype"        => "mysql",
  "dbname"        => "$DATABASE",
  "dbuser"        => "root",
  "dbpass"        => "",
  "dbhost"        => "$SERVER",
  "dbtableprefix" => "oc_",
  "dbdriveroptions" => array(
    PDO::MYSQL_ATTR_SSL_CA   => "/app/certs/ca.crt",
    PDO::MYSQL_ATTR_SSL_CERT => "/app/certs/$NAME.crt",
    PDO::MYSQL_ATTR_SSL_KEY  => "/app/certs/$NAME.key",
  ),
  "adminlogin"    => "$USER",
  "adminpass"     => "$PASS",
  'memcache.local' => '\OC\Memcache\APCu',
);
