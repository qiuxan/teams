<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test*/
    public function a_user_can_create_a_team()
    {

//        $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());

        $attributes=['name'=>'acme'];

        $this->post('/teams',$attributes);


        $this->assertDatabaseHas('teams',$attributes);
    }

    /** @test*/
    public function guest_may_not_create_a_team()
    {

       // $this->withoutExceptionHandling();

        $this->post('/teams')->assertRedirect('/login');

    }
}
