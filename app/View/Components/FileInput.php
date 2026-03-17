<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileInput extends Component
{
    public $name;
    public $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.file-input');
    }
}
