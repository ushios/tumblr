<?php

namespace Ushios\Component\Tumblr\Reblog;

use Tumblr\API\Client as TumblrClient;
use Ushios\Component\Tumblr\Reblog\Strategy\ReblogStrategyInterface;

/**
 * Reblogger class interface.
 * @author shugo
 *
 */
interface RebloggerInterface
{
    
    /**
     * Set tumblr client
     * 
     * @param TumblrClient $client
     */
    public function setClient(TumblrClient $client);
    
    /**
     * Set reblog strategy.
     * 
     * @param ReblogStrategyInterface $strategy
     */
    public function setReblogStrategy(ReblogStrategyInterface $strategy);
    
    /**
     * Reblog the post.
     * 
     * @param string $blogName The blog name was posted this method.
     * @param array $post The tumblr post array.
     * @param array $options Reblog options.
     * 
     * @return array|false the response array
     */
    public function reblog($blogName, array $post, array $options = null);
}