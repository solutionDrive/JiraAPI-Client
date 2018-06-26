<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class GetAllJiraIssuesAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_POST;

    /** @var string */
    protected $sRequestUrl = 'search';

    /** @var string[] */
    protected $aArguments = [
        'json' => [
            'jql'           => '
            (project=%s) AND 
            (status=testing OR status=internes\\ testen OR
             status=stage OR status=fertig\\ für\\ stage) order by key asc',
            'startAt'       => 0,
            'maxResults'    => 100,
            'fields'        => [
                    'summary',
                ],
        ],
    ];

    public function __construct(string $projektKey)
    {
        parent::__construct([]);
        $this->aArguments['json']['jql'] = sprintf($this->aArguments['json']['jql'], $projektKey);
    }
}
