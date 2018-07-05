<?php

namespace Mckenziearts\LaravelOAuth\Providers;

use Illuminate\Support\Arr;
use Laravel\Socialite\Two\User;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;

class DribbbleProvider extends AbstractProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    protected $scopes = ['public'];

    /**
     * Get the authentication URL for the provider.
     *
     * @param  string  $state
     * @return string
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(
            'https://dribbble.com/oauth/authorize', $state
        );
    }

    /**
     * Get the token URL for the provider.
     *
     * @return string
     */
    protected function getTokenUrl()
    {
        return 'https://dribbble.com/oauth/token';
    }

    /**
     * Get the raw user for the given access token.
     *
     * @param  string  $token
     * @return array
     */
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(
            'https://api.dribbble.com/v2/user?access_token='.$token
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Map the raw user array to a Socialite User instance.
     *
     * @param  array  $user
     * @return \Laravel\Socialite\Two\User
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id'     => $user['id'],
            'nickname' => $user['login'],
            'name'   => $user['name'],
            'email' => Arr::get($user, 'email'),
            'avatar' => $user['avatar_url'],
        ]);
    }
}
