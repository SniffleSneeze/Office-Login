<?php

namespace App\Entities;

class AdminEntity
{
    private int $passcode;

    /**
     * @return int
     */
    public function getPassword(): int
    {
        return $this->passcode;
    }


}