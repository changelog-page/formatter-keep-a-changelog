<?php

declare(strict_types=1);

use Changelog\Formatter\KeepAChangelog\Formatter;

it('can format the given data', function () {
    expect(
        (new Formatter())->format('1.0.0', '2017-06-20', [
            'added'      => ['A', 'B', 'C'],
            'changed'    => ['A', 'B', 'C'],
            'deprecated' => ['A', 'B', 'C'],
            'removed'    => ['A', 'B', 'C'],
            'fixed'      => ['A', 'B', 'C'],
            'security'   => ['A', 'B', 'C'],
        ])
    )->toBe('## [1.0.0] - 2017-06-20

### Added
- A
- B
- C

### Changed
- A
- B
- C

### Deprecated
- A
- B
- C

### Removed
- A
- B
- C

### Fixed
- A
- B
- C

### Security
- A
- B
- C');
});
