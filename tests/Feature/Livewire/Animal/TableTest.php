<?php

namespace Tests\Feature\Livewire\Animal;

use App\Livewire\Animal\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TableTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(Table::class)
            ->assertStatus(200);
    }
}
