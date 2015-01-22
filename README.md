# Anki Server

[![Build Status](https://travis-ci.org/tomzx/anki-server.svg)](https://travis-ci.org/tomzx/anki-server)
[![Total Downloads](https://poser.pugx.org/tomzx/anki-server/downloads.svg)](https://packagist.org/packages/tomzx/anki-server)
[![Latest Stable Version](https://poser.pugx.org/tomzx/anki-server/v/stable.svg)](https://packagist.org/packages/tomzx/anki-server)
[![Latest Unstable Version](https://poser.pugx.org/tomzx/anki-server/v/unstable.svg)](https://packagist.org/packages/tomzx/anki-server)
[![License](https://poser.pugx.org/tomzx/anki-server/license.svg)](https://packagist.org/packages/tomzx/anki-server)

Anki Server is an alternative to [AnkiWeb](https://ankiweb.net/).


## Requirements

* PHP 5.4 <=

## Installation

1. Download the source code (either by downloading a release or cloning the git repository)
2. Install the dependencies via composer `php composer.phar install`

## Use with Anki (desktop)

1. Go to Tools - Add-ons - Open Add-ons folder
2. Create a new file called my-server.py with the following content (make sure to edit `your-server-address`.

```python
import anki.sync
anki.sync.SYNC_BASE = 'http://your-server-address/'
```

## Use with AnkiDroid

As of now (2014-12-31) AnkiDroid does not support specifying a custom AnkiServer. I've [submitted a PR](https://github.com/ankidroid/Anki-Android/pull/680) that should make it possible to do so.

1. Go to Settings - Advanced - Anki Server URL
2. Change the URL to point to `http://your-server-address/`

## Note

This code was developed/tested with `Anki Desktop 2.0.31` and a custom build of `AnkiDroid`. Anki 1 is not supported and any previous versions of `Anki Desktop` may not work. Try at your own risk.

## License

The code is licensed under the [MIT license](http://choosealicense.com/licenses/mit/). See LICENSE.