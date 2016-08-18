<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use EventApp\Domain\Models\Repositories\UserRepositoryInterface;

class UserRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    protected $userRepository;

    public function setUp()
    {
        parent::setUp();
        $this->userRepository = app(UserRepositoryInterface::class);
    }

    /**
     * @test
     */
    public function it_save_a_user_using_repo()
    {
        $this->assertTrue(true);
    }

}
