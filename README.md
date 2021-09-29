# The Object Transformer Bundle

![Maintenance Status](https://img.shields.io/badge/Maintained%3F-yes-green.svg)
[![Build Status](https://app.travis-ci.com/it-bens/object-transformer-bundle.svg?branch=master)](https://app.travis-ci.com/it-bens/object-transformer-bundle)
[![Coverage Status](https://coveralls.io/repos/github/it-bens/object-transformer-bundle/badge.svg?branch=master)](https://coveralls.io/github/it-bens/object-transformer-bundle?branch=master)

## How to install the bundle?
The package can be installed via Composer:
```bash
composer require it-bens/object-transformer-bundle
```
If you're using Symfony Flex, the bundle will be automatically enabled. For older apps, enable it in your Kernel class.

## How to use the Object Transformer Bundle?
The `TransformationMediator` is registered as a service and all implementations of the `TransformerInterface` 
are registered as transformers in the mediator (if they are configured via autoconfiguration). 
Otherwise, the transformers have to be tagged with `itb_object_transformer.transformer`.

The usage of the object transformer is described here: [GitHub - The Object Transformer](https://github.com/it-bens/object-transformer).

## Contributing
I am really happy that the software developer community loves Open Source, like I do! ♥

That's why I appreciate every issue that is opened (preferably constructive)
and every pull request that provides other or even better code to this package.

You are all breathtaking!