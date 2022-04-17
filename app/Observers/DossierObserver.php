<?php

namespace App\Observers;

use App\Dossier;
use Illuminate\Support\Facades\Auth;

class DossierObserver
{
    /**
     * Handle the Dossier "created" event.
     *
     * @param  \App\Dossier  $dossier
     * @return void
     */
    public function creating(Dossier $dossier)
    {
        //
        $dossier->id_user = Auth::user()->id;
    }

    /**
     * Handle the Dossier "updated" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function updated(Dossier $dossier)
    {
        //
    }

    /**
     * Handle the Dossier "deleted" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function deleted(Dossier $dossier)
    {
        //
    }

    /**
     * Handle the Dossier "restored" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function restored(Dossier $dossier)
    {
        //
    }

    /**
     * Handle the Dossier "force deleted" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function forceDeleted(Dossier $dossier)
    {
        //
    }
}
