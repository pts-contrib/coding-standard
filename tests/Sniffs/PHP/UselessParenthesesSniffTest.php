<?php declare(strict_types = 1);

namespace SlevomatCodingStandard\Sniffs\PHP;

use SlevomatCodingStandard\Sniffs\TestCase;

class UselessParenthesesSniffTest extends TestCase
{

	public function testNoErrors(): void
	{
		$report = self::checkFile(__DIR__ . '/data/uselessParenthesesNoErrors.php');
		self::assertNoSniffErrorInFile($report);
	}

	public function testErrors(): void
	{
		$report = self::checkFile(__DIR__ . '/data/uselessParenthesesErrors.php');

		self::assertSame(16, $report->getErrorCount());

		foreach ([3, 5, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25] as $line) {
			self::assertSniffError($report, $line, UselessParenthesesSniff::CODE_USELESS_PARENTHESES);
		}

		self::assertAllFixedInFile($report);
	}

}