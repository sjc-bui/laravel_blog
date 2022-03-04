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

    public function getContacts()
    {
        return ContactMe::orderBy('is_readed', 'asc')->orderBy('created_at', 'desc')->get();
    }

    public function getContactById($id)
    {
        return ContactMe::findOrFail($id);
    }

    public function markAsRead($id)
    {
        ContactMe::where('id', $id)->update(['is_readed' => 1]);
    }

    public function markAllAsRead()
    {
        ContactMe::where('is_readed', 0)->update(['is_readed' => 1]);
    }

    public function deleteContact($contactId)
    {
        ContactMe::destroy($contactId);
    }
}
