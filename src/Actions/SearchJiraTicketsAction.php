<?php declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class SearchJiraTicketsAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_POST;

    /** @var string */
    protected $sJQL = '';

    /** @var string */
    protected $sRequestUrl = 'search';
    
    public function __construct(string $jql)
    {
        $this->aArguments['json']['jql'] = $jql;
    }
}
