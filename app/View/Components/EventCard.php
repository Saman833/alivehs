<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

namespace App\View\Components;

use Illuminate\View\Component;


class EventCard extends Component
{
    public $eventId;
    public $image;
    public $name;
    public $description;
    public $happeningTime;
    public $isEnrolled;
    public $participants;


    /**
     * Create a new component instance.
     */
    public function __construct($eventId,$image="https://via.placeholder.com/300x200", $name, $description,$happeningTime=1,$isEnrolled=false,$participants)
    {
        $this->eventId = $eventId;
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->happeningTime = $happeningTime;
        $this->isEnrolled = $isEnrolled;
        $this->participants=$participants;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.event-card');
    }
}

