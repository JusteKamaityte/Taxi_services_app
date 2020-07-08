<?php

namespace App\Feedbacks;

use App\Users\User;
use Core\DataHolder;


class Feedback extends Dataholder
{

    /**
     * Metodas nustatantis id reiksme duomenu masyve.
     * @param $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * Metodas grazinantis id reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id ?? null;
    }


    /**
     * Metodas nustatantis id reiksme duomenu masyve.
     * @param $feedback
     */
    public function setFeedback($feedback): void
    {
        $this->feedback = $feedback;
    }

    /**
     * Metodas grazinantis id reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getFeedback()
    {
        return $this->feedback?? null;
    }


    /**
     * Metodas nustatantis userio id reiksme duomenu masyve.
     * @param $feedback_id
     */
    public function setFeedbackId($feedback_id): void
    {
        $this->feedback_id = $feedback_id;
    }

    /**
     * Metodas grazinantis userio id reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getFeedbackId()
    {
        return $this->feedback_id ?? null;
    }


    /**
     * Metodas nustatantis userio id reiksme duomenu masyve.
     * @param $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * Metodas grazinantis userio id reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getUserId()
    {
        return $this->user_id ?? null;
    }

    /**
     * Metodas nustatantis date reiksme duomenu masyve.
     * @param $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * Metodas grazinantis date reiksme is duomenu masyvo.
     * @return |null
     */
    public function getDate(): ?string
    {
        return $this->date ?? null;
    }


    /**
     * Metodas nustatantis vartotojo name reiksme, duomenu masyve.
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Metodas grazinantis vartotojo name reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name ?? null;
    }

    /**
     * Metodas grazina Userio klases id
     * @return User
     */
    public function user(): User
    {
        return \App\Users\Model::get($this->getUserId());
    }


}

