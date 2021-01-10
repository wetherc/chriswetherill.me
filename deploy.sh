#!/usr/bin/env bash

cp chriswetherill.service /usr/lib/systemd/system/chriswetherill.service
systemctl daemon-reload
systemctl restart chriswetherill

cp chriswetherill.me.conf /etc/nginx/conf.d/chriswetherill.me.conf
nginx -t
systemctl reload nginx
