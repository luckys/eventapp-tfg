<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserFunctionalTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->model = app(\EventApp\Domain\Models\Contracts\UserRepositoryInterface::class);
        $this->user = factory(\EventApp\Domain\Models\User::class)->create();
    }

    /**
     * @test
     */
    public function it_login_a_user()
    {
        $this->user = factory(\EventApp\Domain\Models\User::class)->create();
        $credentials = ['email' => $this->user->email, 'password' => 'speaker'];
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
        auth()->login($this->user);
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
        $users = $this->model->all()->count();
        $this->assertEquals(1, $users);
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

    /**
     * @test
     */
    public function it_can_update_profile_a_user()
    {
        auth()->login($this->user);
        auth()->user()->email = 'myuser@example.com';
        $this->put('admin/auth/user/profile', auth()->user()->toArray());
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('admin/auth/user/profile', $with = ['message' => 'Perfil actualizado correctamente']);
        $this->seeInDatabase('users', ['email' => 'myuser@example.com']);

    }

    /**
     * @test
     */
    public function it_can_change_password_of_a_user()
    {
        auth()->login($this->user);
        $params = [
            'old_password' => 'speaker',
            'password' => 'new password',
            'password_confirmation' => 'new password'
        ];
        $this->patch('admin/auth/user/change-password', $params);
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('admin/auth/user/profile', $with = ['message' => 'Contraseña actualizada correctamente']);
        $this->assertNotEquals($this->model->find(auth()->user()->id)->password, auth()->user()->getAuthPassword());
    }
}
