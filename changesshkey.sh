cd /root/.ssh
ssh-keygen -f docker-server.rsa -t rsa -N ''
cat docker-server.rsa.pub > /root/.ssh/authorized_keys
chmod 600 /root/.ssh/authorized_keys;

echo -e "Your New SSH Private Key\n"
cat docker-server.rsa
