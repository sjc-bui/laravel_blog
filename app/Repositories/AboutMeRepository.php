<?php

namespace App\Repositories;

use App\Interfaces\AboutMeRepositoryInterface;
use App\Models\AboutMe;

class AboutMeRepository implements AboutMeRepositoryInterface
{
    public function getLastAboutInfo() {
        return AboutMe::orderBy('created_at', 'desc')->first();
    }

    public function getAbouts() {
        return AboutMe::orderBy('created_at', 'desc')->take(5)->get();
    }

    public function createAbout(array $about)
    {
        return AboutMe::create($about);
    }
}
