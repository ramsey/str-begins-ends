#!/usr/bin/env bash

[[ -f vendor/bin/php-coveralls ]] && travis_retry php vendor/bin/php-coveralls -v || travis_retry php vendor/bin/coveralls -v
