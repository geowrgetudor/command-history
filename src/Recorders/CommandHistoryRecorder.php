<?php

namespace Geow\CommandHistory\Recorders;

use Illuminate\Config\Repository;
use Illuminate\Console\Events\CommandFinished;
use Laravel\Pulse\Pulse;
use Laravel\Pulse\Recorders\Concerns;

class CommandHistoryRecorder
{
    use Concerns\Ignores;

    public array $listen = [
        CommandFinished::class,
    ];

    public function __construct(
        protected Pulse $pulse,
        protected Repository $config
    ) {
    }

    public function record(CommandFinished $event): void
    {
        if ($this->shouldIgnore($event->command)) {
            return;
        }

        $this->pulse->record(
            type: 'executed_command',
            key: json_encode([$event->command, $event->input->getArguments(), $event->input->getOptions(), (string) $event->exitCode], flags: JSON_THROW_ON_ERROR),
        )->count();
    }
}
