<?php

use SilverStripe\Dev\SapphireTest;

class PageTest extends SapphireTest
{
    /**
     * Defines the fixture file to use for this test class
     * @var string $fixture_file
     */
    protected static $fixture_file = 'SiteTreeTest.yml';

    /**
     * Test generation of the URLSegment values.
     *
     * Makes sure to:
     * - Turn things into lowercase-hyphen-format
     * - Generates from Title by default, unless URLSegment is explicitly set
     * - Resolves duplicates by appending a number
     */
    public function testURLGeneration()
    {
        $expectedURLs = [
            'home' => 'home',
            'staff' => 'my-staff',
            'about' => 'about-us',
            'staffduplicate' => 'my-staff-2'
        ];

        foreach ($expectedURLs as $fixture => $urlSegment) {
            $obj = $this->objFromFixture('Page', $fixture);

            $this->assertEquals($urlSegment, $obj->URLSegment);
        }
    }
}
