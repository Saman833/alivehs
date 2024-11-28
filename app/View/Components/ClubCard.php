<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


    /**
     * Create a new component instance.
     */

namespace App\View\Components;

use Illuminate\View\Component;

class ClubCard extends Component
{
    public $clubId;
    public $name;
    public $description;
    public $numberOfMembers;
    public $ownerName;
    public $image;

    /**
     * Create a new component instance.
     */
    public function __construct($clubId, $name, $description, $numberOfMembers, $ownerName="unKnown",$image="https://via.placeholder.com/300x200")
    {
        $this->clubId = $clubId;
        $this->name = $name;
        $this->description = $description;
        $this->numberOfMembers = $numberOfMembers;
        $this->ownerName = $ownerName;
        $this->image=$image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.club-card');
    }
}


/**
     * Get the view / contents that represent the component.
     */

