<?php

namespace Psr\Log;

/**
 * Describes a logger-aware instance.
 */
interface LoggerAwareInterface
{
    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
<<<<<<< HEAD
     * @return void
=======
     * @return null
>>>>>>> da9ddcdcaf58574c96195396b7d792ac372646cb
     */
    public function setLogger(LoggerInterface $logger);
}
