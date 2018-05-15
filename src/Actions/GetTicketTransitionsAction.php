<?php declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class GetTicketTransitionsAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_GET;

    /** @var string */
    protected $sRequestUrl = 'issue/';

    public function __construct(string $ticketKey)
    {
        $this->sRequestUrl .= $ticketKey . '/transitions';
    }
}
