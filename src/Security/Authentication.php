<?php
declare(strict_types=1);

namespace R6API\Client\Security;

/**
 * Credential data to authenticate to the API.
 *
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
class Authentication
{
    /** @var string */
    private $bearer;

    /** @var \DateTimeInterface */
    private $expiration = null;

    /** @var string */
    private $ticket;

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
     * If ticket token is expired.
     *
     * @return bool
     */
    public function isExpired(): bool
    {
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
     */
    public function setExpiration(string $expiration): self
    {
        $this->expiration = new \DateTimeImmutable($expiration);

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
        return $this->ticket;
    }

    /**
     * @param string $ticket
     *
     * @return Authentication
     */
    public function setTicket(string $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }
}
