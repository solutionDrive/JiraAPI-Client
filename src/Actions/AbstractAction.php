<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

abstract class AbstractAction implements ActionInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /** @var string */
    protected $sRequestType = '';

    /** @var string */
    protected $sRequestUrl = '';

    /** @var mixed[] */
    protected $aArguments = [];

    /**
     * @return string[][]
     */
    public function getArguments(): array
    {
        return $this->aArguments;
    }

    public function getRequestUrl(): string
    {
        return $this->sRequestUrl;
    }

    public function getRequestType(): string
    {
        return $this->sRequestType;
    }

    /**
     * @param string[] $requiredFields
     */
    public function __construct(array $requiredFields)
    {
        if (!empty($requiredFields)) {
            switch ($this->sRequestType) {
                case self::METHOD_POST:
                    $this->aArguments['json'] = $requiredFields;
                    break;
                case self::METHOD_GET:
                    $this->sRequestUrl .= '?';
                    foreach ($requiredFields as $sClass => $aList) {
                        $this->sRequestUrl .= $sClass . '=' . implode(',', $aList);
                    }
                    break;
            }
        }
    }
}
