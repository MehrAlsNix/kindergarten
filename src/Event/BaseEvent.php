<?php

namespace MehrAlsNix\kindergarten\Event;

use Symfony\Component\EventDispatcher\Event;

abstract class BaseEvent extends Event
{
    /** @var object Represents an object that is the subject of this event */
    protected $subject;

    /**
     * Initializes this event with the given subject.
     *
     * @param object $subject
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }
    /**
     * Returns the object that is the subject of this event.
     *
     * @return object
     */
    public function getSubject()
    {
        return $this->subject;
    }
    /**
     * Creates a new instance of a derived object and return that.
     *
     * Used as convenience method for fluent interfaces.
     *
     * @param object $subject
     *
     * @return static
     */
    public static function createInstance($subject)
    {
        return new static($subject);
    }
}
