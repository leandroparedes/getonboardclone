<?php

namespace App\Applications\ForProfessionals\Auth;

trait Redirects
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
                        ? $this->authSuccessRedirectTo : config('professionals.auth.successRedirectPath');
    }

    public function authFailedRedirectPath()
    {
        if (method_exists($this, 'authFailedRedirectTo')) {
            return $this->authFailedRedirectTo();
        }

        return property_exists($this, 'authFailedRedirectTo')
                        ? $this->authFailedRedirectTo : config('professionals.auth.failedRedirectPath');
    }
}