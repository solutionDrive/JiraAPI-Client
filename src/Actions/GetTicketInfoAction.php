<?php
declare(strict_types=1);

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
     * @param string[] $requiredFields
     */
    public function __construct(string $ticketKey, array $requiredFields)
    {
        $this->sRequestUrl = sprintf($this->sRequestUrl, $ticketKey);
        parent::__construct($requiredFields);
    }
}
