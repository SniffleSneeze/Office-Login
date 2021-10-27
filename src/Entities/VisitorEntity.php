<?php

namespace App\Entities;

class VisitorEntity
{
    private string $name;
    private string $company;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

}