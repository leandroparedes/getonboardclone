<?php

namespace App\Applications\ForCompanies\Auth;

trait RedirectsCompanies
{
    /**
     * Get the post register | login redirect path.
     *
     * @return string
     */
    public function authSuccessRedirectPath()
    {
        if (method_exists($this, 'authSuccessRedirectTo')) {
            return $this->authSuccessRedirectTo();
        }

        return property_exists($this, 'authSuccessRedirectTo')
                        ? $this->authSuccessRedirectTo : config('companies.auth.successRedirectPath');
    }

    public function authFailedRedirectPath()
    {
        if (method_exists($this, 'authFailedRedirectTo')) {
            return $this->authFailedRedirectTo();
        }

        return property_exists($this, 'authFailedRedirectTo')
                        ? $this->authFailedRedirectTo : config('companies.auth.failedRedirectPath');
    }
}