<?php namespace Mero\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

	public function boot()
	{
		\Event::listen('offline.sitesearch.query', function ($query) {

			// The controller is used to generate page URLs.
			$controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

			// Search your plugin's contents
			$items = Models\Movie
				::where('title', 'like', "%${query}%")
				->orWhere('description', 'like', "%${query}%")
				->get();

			// Now build a results array
			$results = $items->map(function ($item) use ($query, $controller) {

				// If the query is found in the title, set a relevance of 2
				$relevance = mb_stripos($item->title, $query) !== false ? 2 : 1;

				// Optional: Add an age penalty to older results. This makes sure that
				// newer results are listed first.
				// if ($relevance > 1 && $item->created_at) {
				//    $ageInDays = $item->created_at->diffInDays(\Illuminate\Support\Carbon::now());
				//    $relevance -= \OFFLINE\SiteSearch\Classes\Providers\ResultsProvider::agePenaltyForDays($ageInDays);
				// }

				return [
					'title'     => $item->title,
					'text'      => $item->description,
					'url'       => $controller->pageUrl('movie', ['slug' => $item->slug]),
					'thumb'     => $item->thumbnail, // Instance of System\Models\File
					'relevance' => $relevance, // higher relevance results in a higher
					// position in the results listing
					// 'meta' => 'data',       // optional, any other information you want
					// to associate with this result
					// 'model' => $item,       // optional, pass along the original model
				];
			});

			return [
				'provider' => 'Movie', // The badge to display for this result
				'results'  => $results,
			];
		});
	}
}
