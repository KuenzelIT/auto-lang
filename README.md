# AutoLang
AutoLang is a small package for Laravel applications which automatically detects the users browser language and sets this language with the `App::setLocale()` command. 

It uses `Session` to temporarily save the language, so it doesn't need to detect the language on every request. Furthermore you can tell AutoLang which language to use, e.g. if a user wants to switch to another language than the browser has set.

## Installation
#### Get the package
Use the command line to get AutoLang:
~~~
composer require kuenzelit/auto-lang:dev-master
~~~

**OR** put this line in your composer.json file:

~~~
"kuenzelit/auto-lang": "dev-master",
~~~

#### Service Provider
Add the service provider to your list of providers in `app.php`:
~~~
"Kuenzelit/AutoLang/AutoLangServiceProvider",
~~~

#### Alias
If you like, you can register an alias by putting this line in your `aliases` array
~~~
'AutoLang' => 'Kuenzelit\AutoLang\Facades\AutoLang',
~~~


## Interface
The `AutoLang`-Facade provides 4 methods: `set`, `get`, `availableLanguages` and `detectLanguage`:
~~~php
/**
 * Overrides the currently detected language and sets it to the $lang param.
 * $lang has to be from the array of available languages.
 * 
 * @param $lang
 * @throws \Exception
 */
public function set($lang)

/**
 * Returns the current language.
 * @return mixed
 */
public function get()

/**
 * Returns the array of available languages. Can be set in the packages config.php.
 *
 * @return array
 */
public function availableLanguages()

/**
 * Returns the language of the users browser.
 *
 * @return string
 */
public function detectLanguage()

~~~


