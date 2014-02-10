<?php
/**
 * HelperServiceTest.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Tests\Service;


use Gym\Bundle\Service\HelperService;

class HelperServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HelperService
     */
    protected $UT;
    protected function setUp()
    {
        $this->UT = new HelperService();
    }

    public function data_getWeekByNumber()
    {
        return [
            [
                'number' => 2,
                'year' => 2014,
                'result' => new \DateTime('06-01-2014')
            ],
            [
                'number' => 1,
                'year' => 2014,
                'result' => new \DateTime('30-12-2013')
            ],
            [
                'number' => 12,
                'year' => 2014,
                'result' => new \DateTime('17-03-2014')
            ]
        ];
    }

    /**
     * @dataProvider data_getWeekByNumber
     */
    public function test_getWeekByNumber($number, $year, $result)
    {
        $this->assertEquals($result, $this->UT->getWeekByNumber($number, $year));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function test_should_throw_exception_by_year()
    {
        $this->UT->getWeekByNumber(1, 14);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function test_should_throw_exception_by_month()
    {
        $this->UT->getWeekByNumber(0, 2014);
    }
}
 