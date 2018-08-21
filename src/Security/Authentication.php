<?php
declare(strict_types=1);

namespace R6API\Client\Security;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;

/**
 * Credential data to authenticate to the API.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class Authentication
{
    /** @var string */
    private $bearer = '';

    /** @var \DateTimeInterface */
    private $expiration = null;

    /** @var string */
    private $ticket = '';

    /** @var CacheItemPoolInterface */
    protected $cacheItemPool = null;

    /**
     * @param string $email
     * @param string $password
     *
     * @return Authentication
     */
    public static function create(string $email, string $password): self
    {
        $authentication = new static();
        $authentication->bearer = sprintf('Basic %s', base64_encode($email . ':' . $password));
        return $authentication;
    }

    /**
     * Fetch data from cache
     */
    private function fetchFromCache()
    {
        $expiration = $this->cacheItemPool->getItem('r6api.authentication.expiration');
        $this->expiration = $expiration->get();

        $ticket = $this->cacheItemPool->getItem('r6api.authentication.ticket');
        $this->ticket = $ticket->get();
    }

    /**
     * @param null|CacheItemPoolInterface $cacheItemPool
     * @return $this
     */
    public function setCacheItemPool(?CacheItemPoolInterface $cacheItemPool)
    {
        $this->cacheItemPool = $cacheItemPool;

        return $this;
    }

    /**
     * If ticket token is expired.
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        // get data from cache
        if (null === $this->expiration && $this->cacheItemPool instanceof CacheItemPoolInterface) {
            $this->fetchFromCache();
        }

        if (null === $this->expiration) {
            return true;
        }

        return time() >= $this->expiration->getTimestamp();
    }

    /**
     * @param string $expiration
     *
     * @return Authentication
     *
     * @throws \Exception
     * @throws InvalidArgumentException
     */
    public function setExpiration(string $expiration): self
    {
        $this->expiration = new \DateTimeImmutable($expiration);

        if ($this->cacheItemPool instanceof CacheItemPoolInterface) {
            $expiration = $this->cacheItemPool->getItem('r6api.authentication.expiration');
            $expiration->set($this->expiration);
            $this->cacheItemPool->save($expiration);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getBearer(): string
    {
        return $this->bearer;
    }

    /**
     * @return string
     */
    public function getTicket(): string
    {
        // get data from cache
        if ('' === $this->ticket && $this->cacheItemPool instanceof CacheItemPoolInterface) {
            $this->fetchFromCache();
        }

        return $this->ticket;
    }

    /**
     * @param string $ticket
     *
     * @return Authentication
     *
     * @throws InvalidArgumentException
     */
    public function setTicket(string $ticket): self
    {
        $this->ticket = $ticket;

        if ($this->cacheItemPool instanceof CacheItemPoolInterface) {
            $ticket = $this->cacheItemPool->getItem('r6api.authentication.ticket');
            $ticket->set($this->ticket);
            $this->cacheItemPool->save($ticket);
        }

        return $this;
    }
}
