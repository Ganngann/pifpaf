<?php

namespace App\Console\Commands;

use App\Models\Rating;
use Illuminate\Console\Command;
use Carbon\Carbon;

class PublishRatings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ratings:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish ratings that are older than 14 days and still unpublished';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ratingsToPublish = Rating::whereNull('published_at')
            ->where('created_at', '<=', Carbon::now()->subDays(14))
            ->get();

        foreach ($ratingsToPublish as $rating) {
            $rating->update(['published_at' => now()]);
        }

        $this->info(count($ratingsToPublish) . ' ratings published.');

        return 0;
    }
}
