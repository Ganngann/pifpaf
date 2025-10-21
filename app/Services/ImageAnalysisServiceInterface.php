<?php

namespace App\Services;

interface ImageAnalysisServiceInterface
{
    public function getSuggestions(string $imageContent): array;
}
