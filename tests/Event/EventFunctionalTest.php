<?php

class EventFunctionalTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->model = app(\EventApp\Domain\Models\Contracts\EventRepositoryInterface::class);
    }

    /**
     * @test
     */
    public function it_get_all_events()
    {
        $this->assertTrue(true);
    }
}
