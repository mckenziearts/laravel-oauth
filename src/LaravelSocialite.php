<?php

namespace Mckenziearts\LaravelSocialite;

class LaravelSocialite
{
    /**
     * This function construct the socialite buttons with activated providers.
     *
     * @param string $type
     *
     * @return string
     */
    public function socialiteButtons(string $type)
    {
        $providers = config('laravel-socialite.providers');
        $buttons = '<p class="socialite-buttons">';

        foreach ($providers as $provider => $status) {
            if ($status === true) {
                $buttons .= '<a href="'.url("/auth/$provider").'" class="'.config('laravel-socialite.buttons.class').' btn-'.$provider.'">';

                if (config('laravel-socialite.buttons.icon') === true) {
                    $buttons .= "<i class='social-{$provider}'></i>";
                }

                $buttons .= trans("laravelsocialite::word.{$type}", ['provider' => $provider]);
                $buttons .= '</a>';
            }
        }

        $buttons .= '</p>';

        return $buttons;
    }
}
