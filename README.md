# SVA HTTP Echo Container Image

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
* BG_CLASS=bg-primary (https://getbootstrap.com/docs/5.0/utilities/background/#background-color)
* BG_COLOR=orangered (https://www.w3schools.com/cssref/css_colors.asp)
