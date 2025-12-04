<?php

namespace App;

trait ManageProductArrays
{
    public function addIngredient()
    {
        $this->ingredients[] = '';
    }

    public function removeIngredient($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function addBenefit()
    {
        $this->benefits[] = '';
    }

    public function removeBenefit($index)
    {
        unset($this->benefits[$index]);
        $this->benefits = array_values($this->benefits);
    }
}
