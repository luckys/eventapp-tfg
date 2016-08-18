<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_save_a_user_using_post()
    {
        $user = factory(\EventApp\Domain\Models\User::class)->make()->toArray();

        $this->post('/api/admin/users', $user)
             ->seeStatusCode(201);
    }
}
