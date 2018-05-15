<?php declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi\Actions;

class FileUploadAction extends AbstractAction
{
    /** @var string */
    protected $sRequestType = self::METHOD_POST;

    /** @var string */
    protected $sRequestUrl = 'issue/%s/attachments';

    /** @var string[] */
    protected $aArguments = [
      'headers' => [
          'X-Atlassian-Token'   => 'no-check',
      ],
    ];

    /**
     * @param string[] $files
     */
    public function __construct(string $ticketKey, array $files)
    {
        $this->sRequestUrl = sprintf($this->sRequestUrl, $ticketKey);
        foreach ($files as $aFile) {
            $this->aArguments['multipart'][] =
                [
                    'name'      => 'file',
                    'contents'  => fopen($aFile['newPath'], 'r'),
                ];
        }
    }
}
