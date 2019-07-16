# oauth-server2 plugin for CakePHP

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

There two ways to do that. The first is following [`league\oauth2`](https://oauth2.thephpleague.com/installation/) instrunctions.

You can also use the commands below:

`bin/cake oauth-server2.generate_keypair config/`

Will generate two new files, with the names `private.key` and `public.key` on `config` path.

Now you need to setup the follow configurations:

```php
return [
    ...
    'OAuth' => [
        'public_key' => env('OAUTH_PUBLIC_KEY', '/your/path/to/public.key'),
        'private_key' => env('OAUTH_PRIVATE_KEY', '/your/path/to/private.key'),
        'encryption_key' => env('OAUTH_ENCRYPTION_KEY', 'GENERATED ENCRYPTION KEY'),
    ]
]
```
