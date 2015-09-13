<?php
namespace SocialLinks\Providers;

class Meneame extends ProviderBase implements ProviderInterface
{
    protected $domain = 'http://meneame.net';

    /**
     * {@inheritDoc}
     */
    public function shareUrl()
    {
        return $this->buildUrl(
            "{$this->domain}/submit.php",
            array('url')
        );
    }

    /**
     * {@inheritDoc}
     */
    public function shareCountRequest()
    {
        return static::request(
            $this->buildUrl(
                "{$this->domain}/api/url.php",
                array('url')
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function shareCount($response)
    {
        $result = explode(' ', $response);

        if (isset($result[0]) && $result[0] === 'OK') {
            return intval($result[2]);
        }

        return 0;
    }
}
