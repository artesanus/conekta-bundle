ConektaBundle
============

This bundle is a interface over [Conekta PHP library](https://github.com/conekta/conekta-php) for Symfony applications.
Enable several services for inject into of the projects...

For more information check [Conekta documentation](https://github.com/conekta/conekta-php)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c420270d-8a8b-4c0c-acb9-0d8c721a5367/mini.png)](https://insight.sensiolabs.com/projects/c420270d-8a8b-4c0c-acb9-0d8c721a5367)

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
Step 5: Use in Controller | Service

```php
#MyBundle/Controller/MyController.php

public function MyController extends Controlller
{
    // Create a instance of service
    $conekta = $this->get('artesanus.conekta');

    // Create a instance of Customer

    $customer = $conekta->customer();

    // Create a customer

    $customer = $customer::create(array());

    // Create a instance of Order

    $order = $conekta->order();

    // Create a order

    $order = $order::create(array());
}

#MyBundle/Util/Payment.php

use Artesanus\ConektaBundle\ConektaInterface;

public function Payment
{

    /**
     * @var ConektaInterface $conekta
     */
     private $conekta;

    /**
     * @param ConektaInterface $conekta
     */
    public function __construct(ConektaInterface $conekta)
    {
        $this->conekta = $conekta;
    }

    //Or in calls

    /**
     * @param ConektaInterface $conekta
     */
    public function setConekta(ConektaInterface $conekta)
    {
        $this->conekta = $conekta;
    }

    /**
     * @return ConektaInterface
     */
    public function getConekta()
    {
        return $this->conekta;
    }
}

```

That's all. Try and fun!!!

-----------

License
-------

This bundle is published under the [MIT License](LICENSE)


