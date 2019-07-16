# OauthServer2 plugin for CakePHP

Integration of [league\OAuth2](https://oauth2.thephpleague.com) for [CakePHP](https://cakephp.org) `^3.5`.

Inspired by [uafrica/oauth-server](https://github.com/uafrica/oauth-server).

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require cauancabral/oauth-server2
```

## Configuration

You should generate a secure _encryptation key_ and a _public_/_private_ key pair.

First, we'll generate _encryptation key_ running the command:

```bash
vendor/bin/generate-defuse-key
```

Copy printed string to use later. That string will be referenced as `GENERATED ENCRYPTATION KEY`

Now you need a pair of _public_/_private_ keys. Just run the command:

```bash
bin/cake OauthServer2.generate_keypair config/
```

This generate two new files, with the names `private.key` and `public.key` on `config` path.

Now you need to setup the follow configurations:

```php
return [
    ...
    'OAuth' => [
        'public_key' => env('OAUTH_PUBLIC_KEY', '/your/path/to/public.key'),
        'private_key' => env('OAUTH_PRIVATE_KEY', '/your/path/to/private.key'),
        'encryptation_key' => env('OAUTH_ENCRYPTATION_KEY', 'GENERATED ENCRYPTATION KEY'),
    ]
]
```

>As you can see, its possible to use ENV variables to override above values. So, if you want to setup your configurations on `.env`, its OK, but don't forget to put that snippet on your `app.php`
