<?php

class EventTest extends TestCase
{
    /**
     * @test
     */
    public function it_get_request_to_event()
    {
        $this->visit('admin/dashboard')
             ->click('Eventos')
             ->seePageIs('admin/event');

    }
}
