# Yandex.Disk API Provider <!-- omit in toc -->

## Table of Contents <!-- omit in toc -->

- [1. Setup](#1-setup)
	- [1.1. Install plugin](#11-install-plugin)
	- [1.2. Create an application on Yandex](#12-create-an-application-on-yandex)
	- [1.3. Getting a token](#13-getting-a-token)
- [2. How to use](#2-how-to-use)

## 1. Setup

### 1.1. Install plugin

```bash
$ cd /var/www/my-domain.com/wp-content/plugins
$ git clone https://github.com/aslanbaryshnikov/yd-api-provider
$ php yd-api-provider/composer.phar install --no-dev --optimize-autoloader
```

After the plugin is installed, don't forget to activate it on your site.

### 1.2. Create an application on Yandex

Go to the [page](https://oauth.yandex.ru/client/new) for creating an application on Yandex. You need to fill in the following parameters:

- Application name. Enter any, because it doesn't affect anything.
- In the Platforms section, check the box Web services.
- Click on "Submit URL for development".

Then you must grant the application the following rights:

- Record anywhere on the Disk
- Reading the entire Disk
- Access to information about the Disk
- Access to the application folder on Disk

After that, click on the Create Application button. This will open a page with information about the created application. Copy the ID, you will need it in the next step.

### 1.3. Getting a token

Next, you need to get a token for your application. To do this, go to

> https://oauth.yandex.ru/authorize?response_type=token&client_id=APPLICATION_ID

and allow the application to work with your Yandex.Disk. You will be redirected to a page with a token that will be valid for the next 365 days, but remember that you can always get a new token. Copy it and paste into the input field on the plugin settings page on your site. Save your changes.

If you still have questions, you can learn the [instructions](https://yandex.ru/dev/oauth/doc/dg/tasks/get-oauth-token.html) for getting a token from Yandex.

## 2. How to use

The plugin uses [PHP SDK for Yandex.Disk](https://github.com/jack-theripper/yandex) and provides a global **YD_API_Provider** class, through which you can perform any operations with Disk. You can check the available methods [here](https://github.com/jack-theripper/yandex).

```php
add_action('plugins_loaded', 'my_func');

function my_func() {
	$YandexDisk = YD_API_Provider::get_instance();

	echo $YandexDisk->total_space;
}
```
