<?php

namespace MehrAlsNix\kindergarten\Event;

use Psr\Log\LogLevel;

class Logging extends Debugging
{
    /**
     * Default priority level for these events is INFO
     * @var string $priority
     */
    protected $priority = LogLevel::INFO;

    /**
     * Set the priority level for this event.
     *
     * @param int $priority
     *
     * @see LogLevel for the constants used in determining the logging levels.
     *
     * @return Logging event
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }
}
