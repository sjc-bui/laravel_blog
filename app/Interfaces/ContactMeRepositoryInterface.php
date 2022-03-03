<?php

namespace App\Interfaces;

interface ContactMeRepositoryInterface
{
    public function createContact(array $contact);
    public function getContacts();
    public function getContactById($id);
    public function markAsRead($id);
}
