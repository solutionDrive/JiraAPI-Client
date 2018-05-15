<?php declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class GetVersionAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_GET;

    /** @var string */
    protected $sRequestUrl = 'version/%s';

    /**
     * @param string[] $aArguments
     */
    public function __construct(array $aArguments)
    {
        $this->sRequestUrl = sprintf($this->sRequestUrl, $aArguments['version']);
    }
}