<?php

namespace App\EventSubscriber;

use App\Controller\ApprenticeController;
use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ApprenticieSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
        $this->em = $em;
    }
    public function onKernelController(ControllerEvent $event): void
    {
        $controller = $event->getController();

        if (is_array($controller)) {
            [
                $controller,
                $method
            ] = [
                $controller[0],
                $controller[1]
            ];
        }

        if (
            $controller instanceof ApprenticeController
            && $method === 'createapprentice'
            && $event->getRequest()->getMethod() === 'POST'
        ) {
            $log = new Log;
            $log->setCreatedAt(new \DateTime('now'));
            $firsName = $event->getRequest()->request->all()['apprentice']['firstName'];
            $log->setName($firsName);
            $log->setMetaInfo([
                'name' => $firsName,
                'date' => $log->getCreatedAt(),
                'apprentice' => 'CDA'
            ]);
            $this->em->persist($log);
            $this->em->flush();
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
