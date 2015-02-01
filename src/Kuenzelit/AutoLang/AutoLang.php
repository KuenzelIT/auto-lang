<?php  namespace Kuenzelit\AutoLang; 

class AutoLang {
    public function init()
    {
        if(\Session::has('AutoLang'))
        {
            \App::setLocale(\Session::get('AutoLang'));
            return;
        }

        $detectedLang = AutoLang::detectLanguage();
        \Session::put('AutoLang', $detectedLang);
        \App::setLocale($detectedLang);
    }

    public function set($lang)
    {
        if(!in_array($lang, $this->availableLanguages()))
            throw new \Exception('Invalid language supplied');

        \Session::set('AutoLang', $lang);
    }

    public function get()
    {
        return \Session::get('AutoLang');
    }

    public function availableLanguages()
    {
        return \Config::get('auto-lang::config.availableLanguages');
    }

    public function detectLanguage()
    {
        if(!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            return \Config::get('app.locale');

        $acceptLangauge = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

        $lang = !empty($acceptLangauge) ? strtok(strip_tags($acceptLangauge), ',') : '';
        $lang = substr($lang, 0,2);
        $lang = (in_array($lang, $this->availableLanguages())) ? $lang : \Config::get('app.locale');

        return $lang;
    }
}