<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test;

use PHPUnit\Event\AbstractEventTestCase;
use PHPUnit\Event\Code;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AfterTestMethodFinished::class)]
final class AfterTestMethodFinishedTest extends AbstractEventTestCase
{
    public function testConstructorSetsValues(): void
    {
        $telemetryInfo = $this->telemetryInfo();
        $testClassName = self::class;
        $calledMethods = array_map(static function (string $methodName): Code\ClassMethod
        {
            return new Code\ClassMethod(
                self::class,
                $methodName
            );
        }, get_class_methods($this));

        $event = new AfterTestMethodFinished(
            $telemetryInfo,
            $testClassName,
            ...$calledMethods
        );

        $this->assertSame($telemetryInfo, $event->telemetryInfo());
        $this->assertSame($testClassName, $event->testClassName());
        $this->assertSame($calledMethods, $event->calledMethods());
    }
}
