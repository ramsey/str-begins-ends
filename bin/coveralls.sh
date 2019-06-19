#!/usr/bin/env bash

[[ -f vendor/bin/php-coveralls ]] && php vendor/bin/php-coveralls -v || php vendor/bin/coveralls -v
