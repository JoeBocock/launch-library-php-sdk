<div align="center">
    <img src="logo.svg" alt="rocket" width="250" height="auto" />
    <h1>Launch Library PHP API SDK</h1>
    <p>A simple PHP SDK to work with the Launch Library 2 API.</p>
</div>

<div align="center">
    <p>
        <img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/joebocock/launch-library-php-sdk/Tests.yml?style=flat-square">
        <img alt="GitHub issues" src="https://img.shields.io/github/issues/joebocock/launch-library-php-sdk?style=flat-square">
        <img alt="GitHub commit activity" src="https://img.shields.io/github/commit-activity/m/joebocock/launch-library-php-sdk?style=flat-square">
        <img alt="GitHub code size in bytes" src="https://img.shields.io/github/languages/code-size/joebocock/launch-library-php-sdk?style=flat-square">
    </p>
</div>

<br />

> **Warning**: This package is still in active development and in very early stages.

## Table of Contents

- [Introduction](#introduction)
- [Usage](#usage)
- [Development](#development)
- [Contributing](#contributing)

<br />

## Introduction

This PHP Composer package provides a simple SDK to interact with Launch Libraries API for all your space data needs!

This package can be used out-of-box with **zero** configuration. However, you may provide a configured HTTP client if you wish, given it follows PSR-18.

<br />

## Usage

This package is not yet complete, but I am actively working on it. I'm slowly working my way through the various endpoints. To get started, install the package with Composer.

<br />

```shell
composer require joebocock/launch-library-php-sdk
```

<br />

General usage is simple and you can be up and running in no time.

<br />

```php
use JoeBocock\LaunchLibrary\Client;

$client = new Client();
```

<br />

The client has multiple configuration options. Firstly, you can provide a `JoeBocock\LaunchLibrary\Enum\Url`. This enum will determine which endpoint is used when making requests. Secondly a `JoeBocock\Enum\Version` can be provided and is used to decide on which API version should be hit. Finally, under the hood Guzzle will be used to make the request - but if you have your own PSR-18 compliant HTTP client, you may provide it while constructing the `Client` class. This is great for when you need to configure the Client beforehand.

<br />

```php
use GuzzleHttp\Client as GuzzleClient;
use JoeBocock\LaunchLibrary\Client;
use JoeBocock\LaunchLibrary\Enum\Url;
use JoeBocock\LaunchLibrary\Enum\Version;

$client = new Client(
    Url::Development,
    Version::Latest,
    new GuzzleClient(),
);
```

<br />

The main client is composed of sub-clients. Whenever you want to make a request against a specific resource, it can be achieved by doing the following...

<br />

```php
use JoeBocock\LaunchLibrary\Client;

$client = new Client();

$client->agency->index();
```

<br />

While I'd hope nothing goes wrong during usage, sometimes Launch Library might return a 4XX or even 5XX. In this case, the `Client` class throws two different exceptions to help discern the problem.

A `LaunchLibraryRequestException` will occur whenever there was an issue produced by the HTTP Client. Finally, a `LaunchLibraryResponseException` will happen whenever a response was returned that cannot be properly hydrated into an entity.

<br />

## Development

As this is just a package, it has no requirement for a web server locally. Development is powered by a very simple Docker container that is used to run all commands.

To get started, first clone the repository. A Makefile is provided for convenience of command handling...

<br />

```make

# Build the container
make build

# Install Composer Dependencies
make install

# Run the test suite
make test

# Run static analysis
make stan

# Format the codebase
make format

# Lint the codebase
make lint

```

<br />

## Contributing

As the package is still in development and hasn't reached v1 yet, I haven't written any contribution guidelines. But don't let that stop you! Please feel free to fork the codebase, get a feel for the style and submit a PR.
