<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class VisionController extends Controller
{
    public function analyzeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:4096', // Max 4MB
        ]);

        try {
            $imageContent = file_get_contents($request->file('image')->getRealPath());

            $imageAnnotator = new ImageAnnotatorClient();

            // Annotate the image for labels and text
            $response = $imageAnnotator->annotateImage($imageContent, [
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

            // Generate title from the first relevant label or text
            if ($texts && count($texts) > 1) {
                $suggestion['title'] = $texts[1]->getDescription(); // Index 0 is the full text block
            } elseif ($labels) {
                $suggestion['title'] = $labels[0]->getDescription();
            }

            // Generate description from labels
            if ($labels) {
                $labelDescriptions = [];
                foreach (array_slice($labels, 0, 5) as $label) {
                    $labelDescriptions[] = $label->getDescription();
                }
                $suggestion['description'] = 'Cet article pourrait être décrit comme : ' . implode(', ', $labelDescriptions) . '.';
            }

            // Suggest a category from the most confident label
            if ($labels) {
                $suggestion['category'] = strtolower($labels[0]->getDescription());
            }

            $imageAnnotator->close();

            return response()->json($suggestion);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not analyze image. ' . $e->getMessage()], 500);
        }
    }
}
