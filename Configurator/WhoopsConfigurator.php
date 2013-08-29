<?php
/**
 * Author: dmk@dpro.pl
 * Date: 28.08.13
 */
namespace dpro\WhoopsBundle\Configurator;

use Whoops\Handler\HandlerInterface;
use Whoops\Run;

class WhoopsConfigurator
{
    /**
     * @var \Whoops\Handler\HandlerInterface
     */
    protected $handler;

    /**
     * @param HandlerInterface $handler
     */
    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param Run $whoops
     */
    public function configure(Run $whoops)
    {
        $whoops->pushHandler($this->handler);
        $whoops->allowQuit(false);
        $whoops->writeToOutput(false);
    }

}
