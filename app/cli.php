#!/usr/local/bin/php
<?php
declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$driver = new \Behat\Mink\Driver\Selenium2Driver('chrome', [], 'http://hub:4444/wd/hub');
$session = new \Behat\Mink\Session($driver);

try {
    $session->start();

    $urlToOpen = 'https://www.reddit.com/';
    print(sprintf("Visit %s. This may take a while.\n", $urlToOpen));
    $session->visit($urlToOpen);

    $newWidth = 1900;
    $newHeight = (int)$session->evaluateScript('return document.body.clientHeight;') + 100;
    $session->resizeWindow($newWidth, $newHeight);
    print(sprintf("Visited %s\n", $session->getCurrentUrl()));

    $screenshotData = $session->getScreenshot();
    file_put_contents('./screenshot.png', $screenshotData);

    print("Screenshot saved!\n");

} finally {
    $session->stop();
}
