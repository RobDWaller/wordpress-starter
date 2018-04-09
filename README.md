# WordPress Starter Repo

A simple Wordpress starter repo that uses Composer to install WordPress, plugins, themes and vendor packages. The wp-config has been extended so that it is powered by [PHP DotEnv](https://packagist.org/packages/vlucas/phpdotenv) and makes use of .env files which are much better for deployments.

WordPress is pulled in from [JohnPBloch's](https://twitter.com/johnpbloch) WordPress [packagist project](https://packagist.org/packages/johnpbloch/wordpress) that reflects the latest release of WordPress.

Thanks must go to [Chris Sherry](https://twitter.com/tweetingsherry) for his excellent tutorial on modern WordPress development that inspired this project two years ago. See Chris' talk from [PHP UK 17](https://www.youtube.com/watch?v=v57UWTXla3M) to learn more about this subject.

## System Requirements

- PHP >= 7.0
- Yarn (Node, NPM)
- Composer
- MySQL

## Installation

To install the WordPress starter run the following Composer command:

```
// For now just use dev-master while this project is in alpha

composer create-project --prefer-dist rbdwllr/wordpress-starter test dev-master
```

### DotEnv Setup

### Yarn Setup

Then run the initial asset build

```
yarn run dev
```
