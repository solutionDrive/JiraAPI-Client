<?php declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class DoTransitionAction extends AbstractAction
{
    const TEST_FAILED = 111;
    const TEST_SUCCESS = 121;

    /** @var string */
    protected $sRequestType = self::METHOD_POST;

    /** @var string */
    protected $sRequestUrl = 'issue/';

    /** @var string[] */
    protected $aArguments = [
        'json' => [
            'transition' => [
                'id' => 0,
            ],
        ],
    ];

    public function __construct(string $ticketKey, int $transitionId)
    {
        $this->sRequestUrl .= $ticketKey . '/transitions';
        $this->aArguments['json']['transition']['id'] = $transitionId;
    }
}
