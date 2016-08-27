<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/27/16
 * Time: 12:06 PM
 */

namespace EventApp\Application\Services\Talk;


use EventApp\Application\Services\ApplicationService;
use EventApp\Domain\Models\Contracts\TalkRepositoryInterface;

abstract class TalkService implements ApplicationService
{
    protected $talk;

    /**
     * TalkService constructor.
     * @param $talk
     */
    public function __construct(TalkRepositoryInterface $talk)
    {
        $this->talk = $talk;
    }
}