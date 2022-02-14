<?php

declare(strict_types=1);

namespace Changelog\Formatter\KeepAChangelog;

use Carbon\Carbon;
use Changelog\Formatter\Formatter as Contract;
use Illuminate\Support\Str;

final class Formatter implements Contract
{
    public function format(string $version, string $date, array $changes): string
    {
        $result = '## ['.$version.'] - '.Carbon::parse($date)->toDateString().PHP_EOL;
        $result .= $this->appendChanges('added', $changes);
        $result .= $this->appendChanges('changed', $changes);
        $result .= $this->appendChanges('deprecated', $changes);
        $result .= $this->appendChanges('removed', $changes);
        $result .= $this->appendChanges('fixed', $changes);
        $result .= $this->appendChanges('security', $changes);

        return trim($result);
    }

    private function appendChanges(string $type, array $changes): string
    {
        $result = '';

        if (count($changes[$type]) > 0) {
            $result .= PHP_EOL.'### '.Str::title($type).PHP_EOL;

            foreach ($changes[$type] as $security) {
                $result .= '- '.$security.PHP_EOL;
            }
        }

        return $result;
    }
}
