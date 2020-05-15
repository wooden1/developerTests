<?php

///home/zerodock/public_html
$vendorDir = dirname(dirname(__FILE__));

// define constants
define('ROOT', $vendorDir);
define('DS', '/');

$directories =
    [
        'Interface',
        'Route',
        'App/Controller',
        'App/Repository',
        'App/Throwable',
        'App/Installer',
        'App/Model',
        'App/Model/Relation',
        'Database/Connector',
        'Database/Container',
        'Database/Manager',
        'Database/Model',
        'Database/Query',
        'Database/Query/Processor',
        'Database/Query/Processor/Children',
        'Controller',
        'Model',

        'Resource',
        'Throwable',
        'Repository',
        'Controller/Schedule',
        'Controller/Payroll',
        'Controller/Scoreboard',
        'Controller/Meta',
        'Repository/Announcement',
        'Repository/Code',
        'Repository/Employee',
        'Repository/Payroll',
        'Repository/Schedule',
        'Repository/System',
        'Repository/Timesheet',
        'Repository/Worktype',
        'System/Helpers',

    ];

// loop through directories and include all php files therein
foreach ($directories as $value) {
    foreach (glob(ROOT . DS . $value . '/*.php') as $filename) {
        include $filename;
    }
}