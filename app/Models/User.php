<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;

class User
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $createdAt;

    public function __construct(
        int $id,
        string $username,
        string $email,
        string $password,
        DateTimeInterface $createdAt
    )
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function createdAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public static function create(array $attributes): User
    {
        return new User(
            $attributes['id'],
            $attributes['username'],
            $attributes['email'],
            $attributes['password'],
            new Carbon($attributes['created_at'])
        );
    }
}