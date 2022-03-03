<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ContactMeRepositoryInterface;

class ContactMeController extends Controller
{
    private ContactMeRepositoryInterface $contactRepository;

    public function __construct(
        ContactMeRepositoryInterface $contactRepository
    )
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:30',
            'email'   => 'required|email',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:3',
        ]);

        $contact = array(
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'content' => $request->message,
        );

        $this->contactRepository->createContact($contact);

        return back()->with('success', 'Your message has sent.');
    }
}
