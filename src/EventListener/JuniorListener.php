<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class JuniorListener
{
    #[AsEventListener(event: KernelEvents::RESPONSE)]
    public function onKernelResponse(ResponseEvent $event): void
    {
        $event->getResponse()->setContent(
            str_replace(
                'Yvette', '<span class="super-yvette">Yvette</span>',
                $event->getResponse()->getContent()
                )
        );
    }
}
