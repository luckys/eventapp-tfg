<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAcceptanceTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(\EventApp\Domain\Models\User::class)->create();
    }

    /**
     * @test
     */
    public function it_testing_form_for_create_a_user()
    {
        $this->visit('/')
            ->type('taylor@demo.com', 'email')
            ->type('taylor1234', 'password')
            ->type('Taylor', 'firstname')
            ->type('Doe', 'lastname')
            ->press('Registrarse')
            ->seePageIs('/admin/dashboard');
    }

    /**
     * @test
     */
    public function it_testing_form_for_login_a_user()
    {
        $this->visit('/')
            ->type($this->user->email, 'email')
            ->type('speaker', 'password')
            ->press('Entrar')
            ->seePageIs('/admin/dashboard');
    }

    /**
     * @test
     */
    public function it_testing_for_logout_a_user()
    {
        $this->actingAs($this->user)
            ->visit('admin/dashboard')
            ->click('Salir')
            ->seePageIs('/');
    }

    /**
     * @test
     */
    public function it_testing_show_profile_of_a_user()
    {
        $this->actingAs($this->user)
            ->visit('admin/auth/user/profile')
            ->see(auth()->user()->email);
    }
}
