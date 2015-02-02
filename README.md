# AutoLang
AutoLang is a small package for Laravel applications which automatically detects the users browser language and sets this language with the `App::setLocale()` command. 
It uses `Session` to temporarily save the language, so it doesn't need to detect the language on every request. Furthermore you can set tell AutoLang which language to use, e.g. if a user wants to use another language than the browser has set.

## Installation
Use the command line to get AutoLang:

~~~
composer require kuenzelit/auto-lang:dev-master
~~~

or put this line in your composer.json file:

~~~
"kuenzelit/auto-lang": "dev-master",
~~~

And add the service provider to your list of providers in `app.php`:
~~~
"Kuenzelit/AutoLang/AutoLangServiceProvider",
~~~

## Interface
The `AutoLang`-Facade provides 4 methods:
~~~

public function set($lang)

public function get()

public function availableLanguages()

public function detectLanguage()

~~~
