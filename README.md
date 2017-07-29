# WordPress Base Plugin

> This plugin template is based on the work of [dmhendricks/wordpress-base-plugin](https://github.com/dmhendricks/wordpress-base-plugin). Thank you for this great starting point!


## Description

This is a boilerplate WordPress plugin featuring namespace autoloading and integration with [Carbon Fields](https://github.com/htmlburger/carbon-fields). It is intended to be used as a starting point for creating quick WordPress plugins. It contains several examples and dependencies to get you started.

It may also be used as the means of [separating custom code](http://www.billerickson.net/core-functionality-plugin/) from the theme.

## Installation

### Clone Repository

1. At command prompt, change to your `wp-content/plugins` directory.
1. Close the repository: `git clone https://github.com/obstschale/wordpress-base-plugin.git`

### Composer

1. Modify `composer.json` to suit your needs
1. Run `composer install` to install dependencies and autoload namespace

### Yarn / NPM

1. Use Yarn oder NPM to install Laravel Mix
	- Laravel Mix is used to compile SASS and JS
	- `yarn` or `npm install`

## Change Log

#### 0.2.0
From this point on, obstschale/wordpress-base-plugin is developed separately, due to some different ideas.

* Introduce new project structure
* Move Widgets, Shortcodes, Post Types to separate directories
* Split `WidgetLoader` into separate files
* Add `ShortcodeLoader`, which handles all shortocde classes
* Add `ShortcodeInterface`. All Shortcode classes need to implement this interface.
* Use Laravel's Code Style across project
* Move `assets/` to `resources/`
* Use Laravel Mix (Webpack) for SASS and JS compiler
  * Compiled files will be copied to `public/`
  * Use `yarn run production` when plugin version is deployed
  * Use `yarn run development` during dev for file watcher
* Remove `vendor/` from repo

#### 0.1.2

* Moved `/src` to `/app`

#### 0.1.1

* Refactored code
* Added `is_production()` and `is_ajax()` methods

#### 0.1.0 - December 26, 2016

* Initial commit

## Credits

Please support [humans.txt](http://humanstxt.org/). It's an initiative for knowing the people behind a web site. It's an unobtrusive text file that contains information about the different people who have contributed to building the web site.

**WordPress Base Plugin**

	URL: https://github.com/dmhendricks/wordpress-base-plugin
	Author: Daniel M. Hendricks
	GitHub: dmhendricks
	Author URI: https://2lab.net

**Carbon Fields:**

	URL: http://carbonfields.net/
	Author: htmlBurger.com
	Twitter: @htmlburger
	Author URI: https://htmlburger.com/
	Location: London, England

**PostTypes:**

	URL: https://github.com/jjgrainger/PostTypes/
	Author: Joe Grainger
	Twitter: @jjgrainger
	Author URI: https://jjgrainger.co.uk/
	Location: Falmouth, England
