<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Interfaces\ContactMeRepositoryInterface;

class ContactMeController extends Controller
{
    private ContactMeRepositoryInterface $contactRepository;

    public function __construct(
        ContactMeRepositoryInterface $contactRepository
    ) {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Show contact form
     *
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Store contact
     *
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:30',
            'email'   => 'required|email',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:1',
        ]);

        $contact = array(
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'content' => Str::markdown($request->message)
        );

        $this->contactRepository->createContact($contact);

        return back()->with('success', 'Your message has sent.');
    }

    /**
     * Show contacts in admin page.
     *
     */
    public function contacts()
    {
        $contacts = $this->contactRepository->getContacts();
        $count = $contacts->where('is_readed', '=', false)->count();
        return view('admin.contact.index', [
            'contacts' => $contacts,
            'count' => $count
        ]);
    }

    /**
     * Contact detail
     *
     */
    public function show(Request $request)
    {
        $contactId = $request->route('id');
        $this->contactRepository->markAsRead($contactId);
        $contact = $this->contactRepository->getContactById($contactId);
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Update unread message to read.
     *
     */
    public function markAllAsRead()
    {
        $this->contactRepository->markAllAsRead();
        return back();
    }

    /**
     * Delete contact by id.
     *
     */
    public function destroy(Request $request)
    {
        $contactId = $request->route('id');
        $this->contactRepository->deleteContact($contactId);
        return back();
    }
}
