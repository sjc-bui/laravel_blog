<?php

namespace App\Interfaces;

interface AboutMeRepositoryInterface
{
    public function getLastAboutInfo();
    public function getAbouts();
    public function createAbout(array $about);
}
