<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class AddWorklogAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_POST;

    /** @var string */
    protected $sRequestUrl = 'issue/%s/worklog';

    public function __construct(string $ticketKey, string $worklog)
    {
        parent::__construct([]);
        $this->sRequestUrl = sprintf($this->sRequestUrl, $ticketKey);
        $this->aArguments['json'] = $worklog;
    }
}
