<?php
  $container->setParameter('database_host', getEnv("CARBON_MYSQL_DB_HOST")?getEnv("CARBON_MYSQL_DB_HOST"):"db");
  $container->setParameter('database_port', getEnv("CARBON_MYSQL_DB_PORT")?getEnv("CARBON_MYSQL_DB_PORT"):3306);
  $container->setParameter('database_name', getEnv("CARBON_APP_NAME")?getEnv("CARBON_APP_NAME"):"symfonydb");
  $container->setParameter('database_user', getEnv("CARBON_MYSQL_DB_USERNAME")?getEnv("CARBON_MYSQL_DB_USERNAME"):"symfonyusr");
  $container->setParameter('database_password', getEnv("CARBON_MYSQL_DB_PASSWORD")?getEnv("CARBON_MYSQL_DB_PASSWORD"):"symfonypas");

  $container->setParameter('mailer_transport', getEnv("CARBON_MAILER_TRANS")?getEnv("CARBON_MAILER_TRANS"):"smtp");
  $container->setParameter('mailer_host', getEnv("CARBON_MAILER_HOST")?getEnv("CARBON_MAILER_HOST"):"127.0.0.1");
  $container->setParameter('mailer_user', getEnv("CARBON_MAILER_USER")?getEnv("CARBON_MAILER_USER"):null);
  $container->setParameter('mailer_password', getEnv("CARBON_MAILER_PASS")?getEnv("CARBON_MAILER_PASS"):null);
  $container->setParameter('secret', getEnv("CARBON_SECRET")?getEnv("CARBON_SECRET"):"12345678901234567890");
?>
