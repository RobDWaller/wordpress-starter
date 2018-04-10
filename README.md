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

If you download the project manually it will include some testing features such as Behat and Travis that may be of no interest to you and you may need to delete them.

### DotEnv Setup

After the `composer create-project` command is run your .env file will be created automatically based on the .env.example file. Also the relevant WordPress salts and keys will be appended to the end of the .env file via the [wordpress-salts-generator](https://packagist.org/packages/rbdwllr/wordpress-salts-generator) library.

You will need to edit the .env file to match your specific environment in regards to database, etc.

If you have installed this package manually rather than via Composer we advise that you just copy the .env.example file. Also you can append the required salts to the end of .env file using this following command:

```
vendor/bin/wpsalts dotenv --clean >> .env
```

### Yarn Setup

This project makes use of [Yarn](https://yarnpkg.com/en/) rather than NPM directly, we find Yarn generally works better.

To install the required dependencies run the following command:

```
yarn install
```

Once Yarn has installed all the required dependencies you can build your JavaScript and SASS files by running the below command. Note you will need to run this command to get the base theme working.

```
yarn run dev
```

## Theme

The WordPress starter project comes with a pre-built base theme stored in the `./public/wp-content/themes/project-theme` directory.

This theme is turned on by default in the `wp-config.php` file. See the constant `WP_DEFAULT_THEME`.

We have tightly coupled the theme to the project so that JavaScript and SASS files can be built at the root level as this makes site deployments far easier.

## Authors

- Rob Waller [@RobDWaller](https://twitter.com/RobDWaller)
- Chris Boakes [GitHub](https://github.com/chrisboakes)
