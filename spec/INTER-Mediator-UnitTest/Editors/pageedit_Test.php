<?php
/**
 * pageedit_Test file
 */

namespace Editors;

use PHPUnit\Framework\Attributes\BackupGlobals;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\TestCase;

class pageedit_Test extends TestCase
{
    public function setUp(): void
    {
        $_SERVER['SCRIPT_NAME'] = __FILE__;
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
        $_SERVER['REQUEST_TIME_FLOAT'] = microtime(true);
    }

    #[BackupGlobals(true)]
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function test___construct()
    {
        ob_start();
        $imPath = \INTERMediator\IMUtil::pathToINTERMediator();
        require_once($imPath . '/editors/pageedit.php');
        $output = ob_get_contents();
        $this->assertStringNotContainsString('INTERMediatorLog.debugMode=', $output);
        ob_end_clean();
    }
}
