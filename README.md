WhoopsBundle
============
This bundle integrates handy Whoops library into Symfony2. It aplies webprofiler's toolbar as well.

Any suggestions are appreciated.

INSTALLATION
-----------
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
        if (in_array($this->getEnvironment(), array('dev'))) {
            $bundles[] = new dpro\WhoopsBundle\dproWhoopsBundle();
        }

        return $bundles;
    }
```
