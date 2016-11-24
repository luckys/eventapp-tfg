<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventFunctionalTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->model = app(\EventApp\Domain\Models\Contracts\EventRepositoryInterface::class);
        $this->event = factory(\EventApp\Domain\Models\Event::class)->create();
    }

    /**
     * @test
     */
    public function it_get_all_events()
    {
        $events = $this->model->all()->count();
        $this->assertEquals(1, $events);
    }
}
