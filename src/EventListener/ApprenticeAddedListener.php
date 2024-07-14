<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

final class ApprenticeAddedListener
{
    #[AsEventListener(event: 'apprentice.create')]
    public function onApprentice($event): void
    {
        // ...
    }
}
