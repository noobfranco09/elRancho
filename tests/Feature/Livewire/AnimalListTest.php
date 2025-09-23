<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AnimalList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AnimalListTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(AnimalList::class)
            ->assertStatus(200);
    }
}
