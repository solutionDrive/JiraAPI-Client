<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\JiraApi;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use solutionDrive\JiraApi\Actions\AddWorklogAction;
use solutionDrive\JiraApi\Actions\DoTransitionAction;
use solutionDrive\JiraApi\Actions\FileUploadAction;
use solutionDrive\JiraApi\Actions\GetAllJiraIssuesAction;
use solutionDrive\JiraApi\Actions\GetAllProjectsAction;
use solutionDrive\JiraApi\Actions\GetProjectAction;
use solutionDrive\JiraApi\Actions\GetTicketInfoAction;
use solutionDrive\JiraApi\Actions\GetTicketTransitionsAction;
use solutionDrive\JiraApi\Actions\GetUserAction;
use solutionDrive\JiraApi\Actions\GetVersionAction;
use solutionDrive\JiraApi\Actions\RemoveAttachmentAction;
use solutionDrive\JiraApi\Actions\SearchJiraTicketAction;
use solutionDrive\JiraApi\Actions\SearchJiraTicketsAction;
use solutionDrive\JiraApi\Actions\SetTicketFieldsAction;

class JiraConnector
{
    /** @var null|JiraConnector */
    protected $oJiraApi = null;

    public function __construct(JiraConnectorCore $oJiraApi)
    {
        $this->oJiraApi = $oJiraApi;
    }

    public function getAllJiraIssues(string $projectKey): Response
    {
        $oAction = new GetAllJiraIssuesAction($projectKey);
        return $this->executeAction($oAction);
    }

    public function getAllProjects(): Response
    {
        $oAction = new GetAllProjectsAction([]);
        return $this->executeAction($oAction);
    }

    public function getJiraIssueById(string $ticketKey): Response
    {
        $oAction = new SearchJiraTicketAction($ticketKey);
        return $this->executeAction($oAction);
    }

    public function getProject(string $projectKey): Response
    {
        $oAction = new GetProjectAction($projectKey);
        return $this->executeAction($oAction);
    }

    /**
     * @param string[][] $files
     */
    public function fileUpload(string $ticketKey, array $files): Response
    {
        $oAction = new FileUploadAction($ticketKey, $files);
        return $this->executeAction($oAction);
    }

    /**
     * @param string[] $requiredFields
     */
    public function getTicketInfo(string $ticketKey, array $requiredFields): Response
    {
        $oAction = new GetTicketInfoAction($ticketKey, $requiredFields);
        return $this->executeAction($oAction);
    }

    public function addWorklog(string $ticketKey, string $worklog): Response
    {
        $oAction = new AddWorklogAction($ticketKey, $worklog);
        return $this->executeAction($oAction);
    }

    public function getTicketTransitions(string $ticketKey): Response
    {
        $oAction = new GetTicketTransitionsAction($ticketKey);
        return $this->executeAction($oAction);
    }

    public function doTransition(string $ticketKey, int $transitionId): Response
    {
        $oAction = new DoTransitionAction($ticketKey, $transitionId);
        return $this->executeAction($oAction);
    }

    public function getUser(): Response
    {
        $oAction = new GetUserAction([]);
        return $this->executeAction($oAction);
    }

    public function removeAttachments(string $attachmentId): Response
    {
        $oAction = new RemoveAttachmentAction($attachmentId);
        return $this->executeAction($oAction);
    }

    public function searchJiraTickets(string $jql): Response
    {
        $oAction = new SearchJiraTicketsAction($jql);
        return $this->executeAction($oAction);
    }

    /**
     * @param string[] $ticketFields
     */
    public function setTicketFields(string $ticketKey, array $ticketFields): Response
    {
        $oAction = new SetTicketFieldsAction($ticketKey, $ticketFields);
        return $this->executeAction($oAction);
    }

    public function getVersion(string $version): Response
    {
        $oAction = new GetVersionAction($version);
        return $this->executeAction($oAction);
    }

    protected function executeAction(Actions\ActionInterface $oAction): Response
    {
        try {
            $oResponse = $this->oJiraApi->requestApi($oAction);
        } catch (RequestException $oException) {
            $oResponse = $oException->getResponse();
        }
        return $oResponse;
    }
}
