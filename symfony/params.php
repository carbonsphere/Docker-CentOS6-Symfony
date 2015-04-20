<?php
  $container->setParameter('database_host', getEnv("CARBON_MYSQL_DB_HOST"));
  $container->setParameter('database_port', getEnv("CARBON_MYSQL_DB_PORT"));
  $container->setParameter('database_name', getEnv("CARBON_APP_NAME"));
  $container->setParameter('database_user', getEnv("CARBON_MYSQL_DB_USERNAME"));
  $container->setParameter('database_password', getEnv("CARBON_MYSQL_DB_PASSWORD"));

  $container->setParameter('mailer_transport', getEnv("CARBON_MAILER_TRANS"));
  $container->setParameter('mailer_host', getEnv("CARBON_MAILER_HOST"));
  $container->setParameter('mailer_user', getEnv("CARBON_MAILER_USER"));
  $container->setParameter('mailer_password', getEnv("CARBON_MAILER_PASS"));
  $container->setParameter('secret', getEnv("CARBON_SECRET"));
?>
