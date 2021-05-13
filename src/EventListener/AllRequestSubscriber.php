<?php


namespace App\EventListener;



use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AllRequestSubscriber implements EventSubscriberInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $requestLogger)
    {
        $this->logger = $requestLogger;
    }

    public function onKernelRequest (RequestEvent $event)
    {
        $request = $event->getRequest();
        $requestDate = $request->server->get('REQUEST_TIME');
        $date = date(' l j M, Y h:i:s', $requestDate);
        $requestFullUri = $request->getUri();
        $requestUri = $request->getRequestUri();
        $this->logger->info('Request custom', [
            'uri' => $requestUri,
            'full_uri' => $requestFullUri,
            'date' => $date
        ]);
        //dd($requestUri,$request->getUri(),$date,$requestDate, $request);
    }


    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST  => ['onKernelRequest', 15],
        ];
    }

}