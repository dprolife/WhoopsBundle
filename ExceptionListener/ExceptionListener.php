<?php
/**
 * Author: dmk@dpro.pl
 * Date: 28.08.13
 */
namespace dpro\WhoopsBundle\ExceptionListener;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Whoops\Run;

class ExceptionListener implements EventSubscriberInterface
{
    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var \Whoops\Run
     */
    protected $whoops;

    /**
     * @param EventDispatcherInterface $dispatcher
     * @param Run $whoops
     */
    public function __construct(EventDispatcherInterface $dispatcher, Run $whoops)
    {
        $this->dispatcher = $dispatcher;
        $this->whoops = $whoops;
    }

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $whoopsResponse = $this->whoops->handleException($exception);
        $event->setResponse(new Response($whoopsResponse));

        //just for profiler @todo refactor
        $event = new FilterResponseEvent($event->getKernel(), $event->getRequest(), $event->getRequestType(), $event->getResponse());
        $this->dispatcher->dispatch(KernelEvents::RESPONSE, $event);
    }


    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => array('onKernelException', 0),
        );
    }
}
