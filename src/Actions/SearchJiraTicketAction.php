<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class SearchJiraTicketAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_POST;

    /** @var mixed|string */
    protected $sTicketKey = '';

    /** @var string */
    protected $sRequestUrl = 'search';

    /** @var string[] */
    protected $aArguments = [
        'json' => [
            'jql'           => 'key=',
            'startAt'       => 0,
            'maxResults'    => 1,
        ],
    ];

    public function __construct(string $ticketKey)
    {
        parent::__construct([]);
        $this->aArguments['json']['jql'] .= $ticketKey . ' order by key asc';
    }
}
