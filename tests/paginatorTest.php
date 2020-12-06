<?php
use PHPUnit\Framework\TestCase;

use \PaginationPack\Service\Pagination;

class PaginatorTest extends TestCase
{
    public function testGetNumberPages()
    {
        $pagination = new Pagination(1, 100, 10, 3, false);

        $this->assertEquals(10, $pagination->getNumberPages());

        return $pagination;
    }

    /**
     * @depends testGetNumberPages
     */
    public function testGetPage($pagination)
    {
        $this->assertEquals(1, $pagination->getPage());
    }

    /**
     * @depends testGetNumberPages
     */
    public function testGetFirstShownPage($pagination)
    {
        $this->assertEquals(1, $pagination->getFirstShownPage());
    }

    /**
     * @depends testGetNumberPages
     */
    public function testGetLastShownPage($pagination)
    {
        $this->assertEquals(4, $pagination->getLastShownPage());
    }

    /**
     * @depends testGetNumberPages
     */
    public function testGetFirstPageElement($pagination)
    {
        $this->assertEquals(0, $pagination->getFirstPageElement());
    }

    /**
     * @depends testGetNumberPages
     */
    public function testGetLast($pagination)
    {
        $this->assertEquals(10, $pagination->getLast());
    }

    public function testReverse()
    {
        $pagination = new Pagination(2, 100, 10, 3, true);

        $this->assertEquals(10, $pagination->getNumberPages());

        return $pagination;
    }

    /**
     * @depends testReverse
     */
    public function testReverseGetFirstPageElement($pagination)
    {
        $this->assertEquals(80, $pagination->getFirstPageElement());
    }

    /**
     * @depends testReverse
     */
    public function testReverseGetLast($pagination)
    {
        $this->assertEquals(90, $pagination->getLast());
    }
}