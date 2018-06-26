<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class GetProjectAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_GET;

    /** @var string */
    protected $sRequestUrl = 'project/%s';

    public function __construct(string $projectKey)
    {
        parent::__construct([]);
        $this->sRequestUrl = sprintf($this->sRequestUrl, $projectKey);
    }
}
