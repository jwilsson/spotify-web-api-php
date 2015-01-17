---
layout: default
title: Installation
---

There are two ways to install `spotify-web-api-php`. The "classic way" or the [Composer](https://getcomposer.org/) way.

### "Classic way"
The "classic" way to install `spotify-web-api-php` is to simply download the latest version and include the required files.
It's highly recommend to use [Composer](https://getcomposer.org/) or at least a [autoloader](http://php.net/manual/en/language.oop5.autoload.php).

### Composer way
The second way is by using [Composer](https://getcomposer.org/) and adding `spotify-web-api-php` as a dependency.

    "require": {
        "jwilsson/spotify-web-api-php": "0.7.*"
    }

*Note: Before a 1.0 release the API should be considered unstable and you should lock your dependency version to a minor one. For more info about versions, please refer to the [semver](http://semver.org/) documentation.*

Now, take a look at the [Authorization steps](authorization.html), the [Method Reference]({{ site.baseurl }}/method-reference/) and some [examples]({{ site.baseurl }}/examples/).
