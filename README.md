
WhoopsBundle
============
This bundle integrates handy Whoops library, which decorated error displaying. The feature of bundle is that the web debug toolbar is applied.

Any suggestions are appreciated.

==INSTALATION==
Installing this bundle can be done through these simple steps:

1. Add this bundle to your project as a composer dependency:
```javascript
    // composer.json
    {
        // ...
        require-dev: {
            // ...
            "dprolife/whoops-bundle": "dev-master"
        }
    }
```

2. Add this bundle in your application kernel:
```php
    // app/AppKernel.php
    public function registerBundles()
    {
        // ...
        if (in_array($this->getEnvironment(), array('test'))) {
            $bundles[] = new dpro\WhoopsBundle\dproWhoopsBundle();
        }

        return $bundles;
    }
```