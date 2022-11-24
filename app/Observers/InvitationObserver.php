<?php

namespace App\Observers;

use App\Models\Invitation;
use Illuminate\Support\Facades\Hash;

class InvitationObserver
{
    public function creating(Invitation $invitation)
    {
        $invitation->slug = Hash::make(uniqid());
    }
}
