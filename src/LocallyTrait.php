<?php
namespace Smartisan\Locally;

use Smartisan\Locally\Exceptions\LanguageNotFound;

trait LocallyTrait
{
    /**
     * Set user prefered locale.
     *
     * @param $code
     * @throws LanguageNotFound
     */
    public function setLocale($code)
    {
        $locally = app('Smartisan\Locally\Locally');

        if (!$locally->exists($code)) {
            throw new LanguageNotFound;
        }

        $this->locale = $code;
        $this->save();

        session()->put('locale', $code);
    }

    /**
     * Return user prefered locale.
     * If not exists, return the default system locale.
     *
     * @return mixed
     */
    public function getLocale()
    {
        if (session('locale')) {
            return session('locale');
        } else {
            if ($this->locale) {
                return $this->locale;
            }
        }

        return config('app.locale');
    }

    /**
     * Remove user prefered locale.
     *
     * @return mixed
     */
    public function removeLocale()
    {
        if ($this->locale) {
            session()->forget('locale');
            $this->locale = '';
            $this->save();
        }
    }
}