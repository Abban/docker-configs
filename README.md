# docker-configs
Abban's Docker setup for various projects.

## Requirements

**Dnsmasq**

A handy trick for Docker that I learned from [here](https://medium.com/@sumankpaul/use-nginx-proxy-and-dnsmasq-for-user-friendly-urls-during-local-development-a2ffebd8b05d). The basic installation I use is:

```
$ brew install dnsmasq
$ sudo echo 'address=/.knack/127.0.0.1' >> /usr/local/etc/dnsmasq.conf
$ sudo mkdir -p /etc/resolver
$ echo 'nameserver 127.0.0.1' | sudo tee /etc/resolver/knack
$ sudo brew services restart dnsmasq
```
This will automatically point all `blah.knack` domains to your localhost which are then picked up through the `nginx-proxy` Docker service and mapped to the specified containers. This means you can access your containers through custom vhost names rather than `http://localhost:[PORT]`. It also allows easier external database connections into your containers. Eg: for my php setup you can connect Sequel Pro through `http://db.my-project.knack`.