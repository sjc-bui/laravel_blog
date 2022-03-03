<?php

namespace App\Repositories;

use App\Interfaces\ContactMeRepositoryInterface;
use App\Models\ContactMe;

class ContactMeRepository implements ContactMeRepositoryInterface
{
    public function createContact(array $contact)
    {
        return ContactMe::create($contact);
    }
}
