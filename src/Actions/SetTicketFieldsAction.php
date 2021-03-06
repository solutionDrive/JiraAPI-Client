<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class SetTicketFieldsAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_PUT;

    /** @var string */
    protected $sRequestUrl = 'issue/';

    /** @var ?string */
    protected $sTicket = null;

    /** @var string[] */
    protected $aTicketInformation = [];

    /**
     * @param string[] $aTicketInformation
     */
    public function __construct(string $ticketKey, array $aTicketInformation)
    {
        parent::__construct([]);
        $this->sTicket = $ticketKey;
        $this->aTicketInformation = $aTicketInformation;
    }

    /**
     * @return string[]
     */
    public function getArguments(): array
    {
        $aInfo = $this->aTicketInformation;
        $oObject = new \stdClass();

        foreach ($aInfo as $fieldName => $fieldValue) {
            $oObject->$fieldName = $fieldValue;
        }

        return [
            'json' => ['fields' => $oObject],
        ];
    }

    public function getRequestUrl(): string
    {
        return $this->sRequestUrl . $this->sTicket;
    }
}
