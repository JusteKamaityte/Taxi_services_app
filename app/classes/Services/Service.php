<?php

namespace App\Services;

use Core\DataHolder;

class Service extends DataHolder
{

    /**
     * Metodas nustatantis user'io id reiksme, duomenu masyve.
     * @param $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * Metodas grazinantis user'io id reiksme, is duomenu masyvo.
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id ?? null;
    }

    /**
     * Metodas nustatantis vartotojo name reiksme, duomenu masyve.
     * @param string $name
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Metodas grazinantis vartotojo name reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title ?? null;
    }

    /**
     * Metodas nustatantis userio roles reiksme, duomenu masyve.
     * @param int $role
     */
    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    /**
     * Metodas grazinantis userio roles reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getRole(): ?int
    {
        return $this->role ?? null;
    }

    /**
     * Metodas nustatantis gerimo nuotraukos URL, duomenu masyve.
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * Metodas grazinantis gerimo nuotraukos URL is duomenu masyvo.
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo ?? null;
    }

}