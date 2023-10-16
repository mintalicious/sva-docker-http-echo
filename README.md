# SVA HTTP Echo Container Image (2021/08/30)

## Creators
* Erik Schindler
* Stephan Kühne

## Why?
* based on Alpine -> small size image
* includes Apache and PHP
* AllowOverride All
* mod_rewrite enabled

## Usage
```
docker run -d -p 8080:80 mintalicious/sva-http-echo:latest
```
Then open `http://localhost:8080/` inside your browser.
An .htaccess file with catch all rules is integrated.
Other existing URLs:
* /index.php
* /info.php
* /logo.svg
* /bootstrap.min.css

## Environment
* TITLE=SVA-Demo-HTTP-Echo
* SHOW_CONTAINER_HOSTNAME=true
* BG_CLASS=bg-primary (https://getbootstrap.com/docs/5.0/utilities/background/#background-color)
* BG_COLOR=random|orangered (https://www.w3schools.com/cssref/css_colors.asp)

|Env|Effect|
|---|------|
|SHOW_CONTAINER_HOSTNAME=true|display content of container's /etc/hostname|
|BG_COLOR=random|colorize the header depending on the container hostname (which should be a hex string) or with a random color|
