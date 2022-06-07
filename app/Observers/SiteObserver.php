<?php

namespace App\Observers;

use App\Models\Site;
use App\Models\SiteConfig;

class SiteObserver
{
    public function creating(Site $site)
    {
        $site->config = [];
    }

    public function created(Site $site)
    {
    }

    /**
     * Handle the Site "updated" event.
     *
     * @param  \App\Models\Site  $site
     * @return void
     */
    public function updated(Site $site)
    {
        //
    }

    /**
     * Handle the Site "deleted" event.
     *
     * @param  \App\Models\Site  $site
     * @return void
     */
    public function deleted(Site $site)
    {
        //
    }

    /**
     * Handle the Site "restored" event.
     *
     * @param  \App\Models\Site  $site
     * @return void
     */
    public function restored(Site $site)
    {
        //
    }

    /**
     * Handle the Site "force deleted" event.
     *
     * @param  \App\Models\Site  $site
     * @return void
     */
    public function forceDeleted(Site $site)
    {
        //
    }
}
