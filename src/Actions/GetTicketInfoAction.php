<?php declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class GetTicketInfoAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_GET;

    /** @var string */
    protected $sRequestUrl = 'issue/%s';

    /**
     * @param string[] $aParameter
     */
    public function __construct(array $aParameter)
    {
        $this->sRequestUrl = sprintf($this->sRequestUrl, $aParameter['ticketKey']);
        parent::__construct($aParameter);
    }
}