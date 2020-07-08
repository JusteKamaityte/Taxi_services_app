<?php

namespace App\Feedbacks;

use App\Users\User;
use Core\DataHolder;


class Feedback extends Dataholder
{

    const STATUS_SUBMITTED = 0;
    const STATUS_SHIPPED = 1;
    const STATUS_DELIVERED = 2;
    const STATUS_CANCELLED = 3;

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
     * Metodas nustatantis uzsakymo status reiksme duomenu masyve.
     * @param int $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * Metodas grazinantis uzsakymo status reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getStatus(): ?int
    {
        return $this->status ?? null;
    }

    /**
     * Metodas grazina Userio klases id
     * @return User
     */
    public function user(): User
    {
        return \App\Users\Model::get($this->getUserId());
    }

    /**
     * Globalus metodas grazinantis statuso pavadinima
     * pagal status_id
     * @param int|null $status_id
     * @return string
     */
    public function _getStatusName(int $status_id = null)
    {
        $status_id = $status_id ?? $this->getStatus();

        switch ($status_id) {
            case self::STATUS_SUBMITTED:
                $status = 'Pateikta';
                break;
            case self::STATUS_SHIPPED:
                $status = 'Išsiųsta';
                break;
            case self::STATUS_DELIVERED:
                $status = 'Pristatyta';
                break;
            case self::STATUS_CANCELLED:
                $status = 'Atšaukta';
                break;

            default:
                $status = '-';
        }

        return $status;
    }

}

