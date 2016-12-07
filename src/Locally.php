<?php
namespace Smartisan\Locally;

use Smartisan\Locally\Exceptions\LanguageNotFound;
use Smartisan\Locally\Helpers\LanguageHelper;

class Locally
{
    /**
     * Get list of supported locales.
     *
     * @return array
     */
    public function getSupportedLocales()
    {
        $dirs = scandir(resource_path('lang'));
        $codes = array_diff($dirs, array('..', '.'));
        $codes = array_values($codes);

        $locales = [];

        foreach ($codes as $code) {
            $locales = $locales + [$code => LanguageHelper::getLanguageName($code)];
        }

        return $locales;
    }
    
    /**
     * Get language name by code.
     *
     * @param $code
     * @return mixed
     * @throws LanguageNotFound
     */
    public function getLanguageNameByCode($code)
    {
        $name = LanguageHelper::getLanguageName($code);

        if (!$name) {
            throw new LanguageNotFound;
        }

        return $name;
    }

    /**
     * Get language code by name.
     *
     * @param $name
     * @return mixed
     * @throws LanguageNotFound
     */
    public function getLanguageCodeByName($name)
    {
        $code = LanguageHelper::getLanguageCode($name);

        if (!$code) {
            throw new LanguageNotFound;
        }

        return $code;
    }

    /**
     * Check if language exists by code.
     *
     * @param $code
     * @return bool
     * @internal param string $language
     */
    public function exists($code)
    {
        $name = LanguageHelper::getLanguageName($code);

        if (!$name) {
            return false;
        }

        return true;
    }
}