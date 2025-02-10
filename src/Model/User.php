<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\VO\Uid;
use DateTimeInterface;

class User implements Entity
{

    private ?Uid $id;
    private string $login;
    private string $password;
    private string $email;
    private DateTimeInterface $createdAt;

    function __construct(?Uid $id, string $login, string $password, string $email, DateTimeInterface $createdAt)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->createdAt = $createdAt;
    }

    /**
     * @inheritDoc
     */
    public function getId(): ?Uid
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setId(Uid $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the user login.
     *
     * @return string The user login.
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Set the user login.
     *
     * @param string $login The user login to set.
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * Get the user password.
     *
     * @return string The user password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the user password.
     *
     * @param string $password The user password to set.
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Get the user email.
     *
     * @return string The user email.
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the user email.
     *
     * @param string $email The user email to set.
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(DateTimeInterface $date): void
    {
        $this->createdAt = $date;
    }
}