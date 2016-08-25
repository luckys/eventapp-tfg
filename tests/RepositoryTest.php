<?php

use EventApp\Domain\Models\Contracts\UserRepositoryInterface;

class RepositoryTest extends TestCase
{

    protected $model;

    public function setUp()
    {
        parent::setUp();

        $this->model = app(UserRepositoryInterface::class);

    }

    /**
     * @test
     */
    public function it_fetches_all_records()
    {
        factory(\EventApp\Domain\Models\User::class, 10)->create();

        $datas = $this->model->all()->toArray();

        $this->assertGreaterThan(10, $datas);

    }

    /**
     * @test
     */
    public function it_save_a_user()
    {
        $user = factory(\EventApp\Domain\Models\User::class)->make()->toArray();

        $this->model->create($user);

        $this->seeInDatabase('users', ['email' => $user['email']]);

    }
}
