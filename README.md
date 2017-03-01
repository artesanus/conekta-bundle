ConektaBundle
============

This bundle is a interface over [Conekta PHP library](https://github.com/conekta/conekta-php) for Symfony applications.
Enable several services for inject into of the projects...

For more information check [Conekta documentation](https://github.com/conekta/conekta-php)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d9491d6b-4401-491f-a072-41fa749ca1e2/mini.png)](https://insight.sensiolabs.com/projects/d9491d6b-4401-491f-a072-41fa749ca1e2)

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require artesanus/conekta-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Artesanus\ConektaBundle\ConektaBundle()
        );

        // ...
    }

    // ...
}
```

Step 3: Set configurations

```yaml
#app/config/config.yml

conekta:
    api_keys:
        public: PUBLIC_KEY
        private: PRIVATE_KEY
    locale: ~
```
Step 4: Inject the service

```yaml

#app/config/services.yml

services:
    my_service:
        class: AppBundle\Util\MyPrettyService
        calls:
            - [ setConekta, ['@artesanus.conekta']]
```
Or
```yaml
#app/config/services.yml

services:
    my_service:
        class: AppBundle\Util\MyPrettyService
        arguments: ['@artesanus.conekta']
```
Step 5: Use in Controller

```php
#MyBundle/Controller/MyController.php

public function MyController extends Controlller
{
    $conekta = $this->get('artesanus.conekta');
    $charge = $conekta->charge(array());
}
```

That's all. Try and fun!!!

-----------

License
-------

This bundle is published under the [MIT License](LICENSE)


