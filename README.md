# simpler-downloader

It's a simple uploader for a static file server with php support.

Just put this in some subdirectory, and visit it in browser!

## Note:

### You need to change the upload limits for nginx

For current domain:

```nginx
# /etc/nginx/.../xx.conf
server {
    client_max_body_size 8M;

    //other lines...
}
```

For global domain:

```nginx
# /etc/nginx/nginx.conf
http {
    client_max_body_size 8M;

    //other lines...
}
```

### You need to change the upload limits for php-fpm

Use your favourite editor to open `/etc/php/7.0/php-fpm/php.ini` and edit follow lines:

```ini
file_uploads = On
max_file_uploads = 20
upload_max_size = 2M
post_max_size = 8M
```

### Restart nginx and php-fpm

```bash
sudo systemctl restart nginx
sudo systemctl restart php7.0-fpm
```
