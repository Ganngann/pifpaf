<?php

namespace App\Services;

use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Exception;

class GoogleVisionService implements ImageAnalysisServiceInterface
{
    protected $imageAnnotator;

    public function __construct(ImageAnnotatorClient $imageAnnotator)
    {
        $this->imageAnnotator = $imageAnnotator;
    }

    public function getSuggestions(string $imageContent): array
    {
        try {
            $response = $this->imageAnnotator->annotateImage($imageContent, [
                'features' => [
                    ['type' => 'LABEL_DETECTION'],
                    ['type' => 'TEXT_DETECTION'],
                ]
            ]);

            $labels = $response->getLabelAnnotations();
            $texts = $response->getTextAnnotations();

            $suggestion = [
                'title' => '',
                'description' => '',
                'category' => '',
            ];

            if ($texts && count($texts) > 1) {
                $suggestion['title'] = $texts[1]->getDescription();
            } elseif ($labels) {
                $suggestion['title'] = $labels[0]->getDescription();
            }

            if ($labels) {
                $labelDescriptions = [];
                foreach (array_slice($labels, 0, 5) as $label) {
                    $labelDescriptions[] = $label->getDescription();
                }
                $suggestion['description'] = 'Cet article pourrait être décrit comme : ' . implode(', ', $labelDescriptions) . '.';
            }

            if ($labels) {
                $suggestion['category'] = strtolower($labels[0]->getDescription());
            }

            return $suggestion;

        } catch (Exception $e) {
            // In a real app, you'd log this error
            return ['error' => 'Could not analyze image.'];
        }
    }

    public function __destruct()
    {
        $this->imageAnnotator->close();
    }
}
