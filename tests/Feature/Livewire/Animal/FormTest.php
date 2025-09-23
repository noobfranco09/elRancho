<?php

namespace Tests\Feature\Livewire\Animal;

use App\Livewire\Animal\Form;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(Form::class)
            ->assertStatus(200);
    }
}
