<?php

namespace App\View\Components;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\View\Component;

class card extends Component
{
    public $image;
    public $name;
    public $price;
    public $stock;
    public $description;
    public $tags;

    /**
     * Create a new component instance.
     *
     * @param string $image
     * @param string $name
     * @param float $price
     * @param int $stock
     * @param string $description
     * @param array $tags
     */
    public function __construct($image, $name, $price, $stock, $description, $tags)
    {
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->description = $description;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}