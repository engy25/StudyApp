<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Traits\FeedMerger;
use Illuminate\Http\Request;

class FeedController extends Controller
{
  use FeedMerger;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
  /**
   * Pagination for Feed
   */


   public function paginationFeed(Request $request, $userId)
   {
    $feeds = $this->showFeedsToTheDashboard($userId);

    return view("content.feed.pagination_index", compact("feeds"))->render();

   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Feed $feed)
    {
      return view("content.feed.show", compact("feed"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feed $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed)
    {
        //
    }
}
