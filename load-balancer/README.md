```bash
certbot certonly --manual --preferred-challenges=dns --email adamsokode@gmail.com --server https://acme-v02.api.letsencrypt.org/directory --agree-tos -d *.clickwriterpro.com
```

```bash
certbot renew
```

/etc/letsencrypt/live/clickwriterpro.com-0001/privkey.pem
/etc/letsencrypt/live/clickwriterpro.com-0001/fullchain.pem