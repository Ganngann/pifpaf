<?php

namespace App\Services;

use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature\Type;

class ImageAnalysisService
{
    protected $client;

    public function __construct()
    {
        $this->client = new ImageAnnotatorClient();
    }

    public function analyzeImage(string $imagePath): array
    {
        $image = file_get_contents($imagePath);

        $response = $this->client->annotateImage($image, [
            Type::LABEL_DETECTION,
            Type::WEB_DETECTION,
        ]);

        $labels = $response->getLabelAnnotations();
        $webEntities = $response->getWebDetection()->getWebEntities();

        $suggestions = [
            'title' => '',
            'description' => '',
            'category' => '',
        ];

        if (!empty($webEntities)) {
            $suggestions['title'] = $webEntities[0]->getDescription();
        } elseif (!empty($labels)) {
            $suggestions['title'] = $labels[0]->getDescription();
        }

        $descriptionParts = [];
        foreach (array_slice($labels, 0, 5) as $label) {
            $descriptionParts[] = $label->getDescription();
        }
        $suggestions['description'] = 'This item could be described as: ' . implode(', ', $descriptionParts) . '.';

        if (!empty($labels)) {
            $suggestions['category'] = $labels[0]->getDescription();
        }

        return $suggestions;
    }

    public function __destruct()
    {
        $this->client->close();
    }
}
