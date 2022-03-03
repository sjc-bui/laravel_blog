<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\AboutMeRepositoryInterface;

class AboutMeController extends Controller
{
    private AboutMeRepositoryInterface $aboutmeRepository;

    public function __construct(
        AboutMeRepositoryInterface $aboutmeRepository
    ) {
        $this->aboutmeRepository = $aboutmeRepository;
    }

    /**
     * About page
     * 
     */
    public function index()
    {
        $about = $this->aboutmeRepository->getLastAboutInfo();

        return view('aboutme.index', [
            'about' => $about
        ]);
    }

    /**
     * List abouts info
     *
     */
    public function abouts()
    {
        $abouts = $this->aboutmeRepository->getAbouts();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Store about info
     *
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|min:3|max:30',
            'sns'   => 'required|min:3',
            'link'  => 'required|min:3',
            'intro' => 'required|min:3',
        ]);

        $about = array(
            'user_id' => auth()->id(),
            'name' => $request->name,
            'sns' => $request->sns,
            'link' => $request->link,
            'intro' => $request->intro,
        );

        $this->aboutmeRepository->createAbout($about);

        return back()->with('success', 'Infor was added.');
    }

    /**
     * Delete about info
     * 
     */
    public function destroy(Request $request) {
        $aboutId = $request->route('id');
        $this->aboutmeRepository->deleteAbout($aboutId);
        return back();
    }
}
