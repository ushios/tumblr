<?php
namespace Ushios\Component\Tumblr\Tests\Reblog\Strategy;

use Ushios\Component\Tumblr\Reblog\Strategy\AllReblogStrategy;

/**
 * Test the AllReblogStrategy class.
 * @author shugo
 *
 */
class AllReblogStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test the canReblog method.
     */
    public function testReturnTrue()
    {
        $strategy = new AllReblogStrategy();
        
        $dummyPpost = array();
        
        $this->assertTrue($strategy->canReblog($dummyPpost));
    }
}