<?php
declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\Component as ViewComponent;
use Illuminate\View\View;
use Illuminate\Session\SessionManager;

class SessionStatus extends ViewComponent
{
    /**
     * Value for the key to store status label in the session
     */
    public const STATUS_KEY_VALUE = 'status';

    public function __construct(
        private SessionManager $sessionManager
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return ViewFacade::make('components.session-status');
    }

    /**
     * Retrieve label of session status
     *
     * @return string
     */
    public function getSessionStatusLabel(): string
    {
        return (string) $this->sessionManager->get(self::STATUS_KEY_VALUE, '');
    }

    /**
     * Check if the component needs to be rendered
     *
     * @return bool
     */
    public function isNeedToRender(): bool
    {
        $sessionStatusLabel = $this->getSessionStatusLabel();
        return !empty($sessionStatusLabel);
    }
}
