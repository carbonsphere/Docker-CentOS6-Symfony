Author  : CarbonSphere <br>
Email   : carbonsphere@gmail.com<br>

<h2>Docker Symfony 2 Base Platform</h2>

<h4>This is a symfony base container which depends on another DB container (carbonsphere/docker-mysql-phpmyadmin).</h4>

<h3>Setup Procedure</h3>

  - Pull required container
    1. docker pull carbonsphere/docker-mysql-phpmyadmin

    2. docker pull carbonsphere/docker-centos6-symfony

    3. Start DB container 
      "docker run -d --name db carbonsphere/docker-mysql-phpmyadmin"

    4. Start Symfony container 
      "docker run -d -p 8080:80 -p 222:22 --name web --link db:db carbonsphere/docker-centos6-symfony"

    5. Initialize DB from symfony to linked DB
      #use "docker ps" to find your {container id}
      <b>docker exec -it {container id} bash</b>
      #once entered into container shell run the following command to initialize DB
      #Note: This only needs to be done once.
      sh /root/createUserDb.sh

    Note: If you would like to build your own container image.
    - git clone https://github.com/carbonsphere/Docker-Mysql-PHPMyAdmin.git
      cd Docker-Mysql-PHPMyAdmin
      docker build -t carbonsphere/docker-mysql-phpmyadmin .

    - git clone https://github.com/carbonsphere/Docker-CentOS6-Symfony.git
      cd Docker-CentOS6-Symfony
      docker build -t carbonsphere/docker-centos6-symfony

<h4>Exposed Ports</h4>
 - Symfony server port 80
 - SSH 22 "For git check in/out" # Note: Private keys are generated during build time. Check your build log for Symfony SECRET key & Private key
 #Utility script in /root/changesshkey.sh to help you change your private key

<h4>Symfony Environment variables</h4>

# Symfony project folder name
ENV SYMFONYPROJECTNAME 			myProject

# DB Host Name
ENV CARBON_MYSQL_DB_HOST		db

# DB Host Port
ENV CARBON_MYSQL_DB_PORT		3306

# Symfony's DB name
ENV CARBON_APP_NAME				symfonydb

# Symfony's DB Account name
ENV CARBON_MYSQL_DB_USERNAME	symfonyusr

# Symfony's DB Account password
ENV CARBON_MYSQL_DB_PASSWORD	symfonypas

# Mailer Server Type
ENV CARBON_MAILER_TRANS			smtp

# Mailer Host IP/Name
ENV CARBON_MAILER_HOST			127.0.0.1

# Mailer Account name
ENV CARBON_MAILER_USER			null

# Mailer Account password
ENV CARBON_MAILER_PASS			null

# Symfony's Secret token
ENV CARBON_SECRET				DEFAULT_SECRET

<b>These environment variables are used instead of what is in parameters.yml</b>

DEFAULT_SECRET and RSA SSH Private Keys are randomly generated during image built time.
<b>Highly recommend changing your private keys using /root/changesshkey.sh</b>
Change your secret token by "<b>CARBON_SECRET=`cat /dev/urandom | tr -cd 'a-f0-9' | head -c 40`</b>"

You can change these environment variables by using 
<b>docker run -e CARBON_MYSQL_DB_HOST=db01 -d -P --link db:db01 carbonsphere/docker-centos6-symfony</b>

<h3>Checkout Symfony Project from docker container</h3>

1. Check build log for private key. ssh-add private key to your identity
2. git clone ssh://root@{docker ip}:{container port ex:222}/root/{SYMFONYPROJECTNAME ex:myProject}

<h3>Post Receive Instructions</h3>

Git push will execute the following instructions
1. Force checkout from remote checked-in contents
2. Reset properties for newly added/checked-in contents
3. Remove cache
4. Composer Update - Update/Add newly added components 
5. Install assets and dumping assetics
6. Force Update/Create new created/modified DB schema
7. Restart Symfony Server Process


