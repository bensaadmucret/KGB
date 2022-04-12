--TEST--
The right events are emitted in the right order for a test that has a missing dependency
--SKIPIF--
<?php declare(strict_types=1);
if (DIRECTORY_SEPARATOR === '\\') {
    print "skip: this test does not work on Windows / GitHub Actions\n";
}
--FILE--
<?php declare(strict_types=1);
$traceFile = tempnam(sys_get_temp_dir(), __FILE__);

$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--no-output';
$_SERVER['argv'][] = '--trace-text';
$_SERVER['argv'][] = $traceFile;
$_SERVER['argv'][] = __DIR__ . '/_files/MissingDependencyTest.php';

require __DIR__ . '/../../bootstrap.php';

PHPUnit\TextUI\Application::main(false);

print file_get_contents($traceFile);

unlink($traceFile);
--EXPECTF--
Test Runner Started (PHPUnit %s using %s)
Test Runner Configuration Combined
Test Suite Loaded (2 tests)
Test Suite Sorted
Event Facade Sealed
Test Runner Execution Started (2 tests)
Test Suite Started (PHPUnit\TestFixture\MissingDependencyTest, 2 tests)
Test Prepared (PHPUnit\TestFixture\MissingDependencyTest::testOne)
Assertion Failed (Constraint: is true, Value: false)
Test Failed (PHPUnit\TestFixture\MissingDependencyTest::testOne)
Failed asserting that false is true.
Test Finished (PHPUnit\TestFixture\MissingDependencyTest::testOne)
Test Skipped (PHPUnit\TestFixture\MissingDependencyTest::testTwo)
This test depends on "PHPUnit\TestFixture\MissingDependencyTest::testOne" to pass
Test Suite Finished (PHPUnit\TestFixture\MissingDependencyTest, 2 tests)
Test Runner Finished
