<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserFunctionalTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->model = app(\EventApp\Domain\Models\Contracts\UserRepositoryInterface::class);
    }

    /**
     * @test
     */
    public function it_login_a_user()
    {
        $user = factory(\EventApp\Domain\Models\User::class)->create();
        $credentials = ['email' => $user->email, 'password' => 'speaker'];
        $this->post('auth/login', $credentials);
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('admin/dashboard', $with = []);
        $this->assertNotNull(auth()->user());
    }

    /**
     * @test
     */
    public function it_logout_a_user()
    {
        $user = factory(\EventApp\Domain\Models\User::class)->create();
        auth()->login($user);
        $this->get('auth/logout');
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('/', $with = []);
        $this->assertNull(auth()->user());
    }

    /**
     * @test
     */
    public function it_get_all_users()
    {
        factory(\EventApp\Domain\Models\User::class, 6)->create();
        $users = $this->model->all()->count();
        $this->assertEquals(6, $users);
    }

    /**
     * @test
     */
    public function it_can_register_a_user()
    {
        $user = factory(\EventApp\Domain\Models\User::class)->make();
        $this->post('auth/signup', $user->toArray());
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('admin/dashboard', $with = []);
        $this->seeInDatabase('users', ['email' => $user->email]);

    }
}
