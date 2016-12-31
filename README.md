# Xing Recommendation Entities
Offers Entities that implement the Mode Recommendation for Entries of the package publisher/entry-xing.

# Installation
The recommended way to install this is through [composer](http://getcomposer.org).

Edit your `composer.json` and add:

```json
{
    "require": {
        "publisher/entity_xing_recommendation": "dev-master"
    }
}
```

And install dependencies:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install
```

# Form (symfony/form)
You can find a symfony form in src/Recommendation/Form/Type/
and a twig template in Resources/view/.

# Validation with symfony/validator
A general validation config for the entity is provided in Resources/config/validation.yml.
If you want to use it you need to require symfony/validator and publisher/entry_xing, too.
