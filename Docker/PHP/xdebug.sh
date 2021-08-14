#!/bin/bash
ip route show default | awk '/default/ {print $3}' >> /usr/local/etc/php/conf.d/infaestructure-overrides.ini