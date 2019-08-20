<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Todo;

class CreateTodoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

     /** @test */
    public function createToDo()
    {
        $todo = factory(Todo::class)->raw();

        $this->get('/');
        $this->post('/', $todo);
        $this->assertDatabaseHas('todos' ,$todo); 
    }

    /** @test */
    public function deleteToDo()
    {
        $todo = factory(Todo::class)->create();

        $this->delete('/'. $todo->id);
        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
        ]);
    }    
    
    /** @test */
    public function editToDo()
    {
        $todo = factory(Todo::class)->create();

        $this->put('/'. $plan->id, [
            'Title' => 'NewName',
        ]);
        $this->assertEquals('NewName', $plan->fresh()->name);
    }
}
