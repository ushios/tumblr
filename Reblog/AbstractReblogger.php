<?php

namespace Ushios\Component\Tumblr\Reblog;

use Tumblr\API\Client as TumblrClient;
use Ushios\Component\Tumblr\Reblog\Strategy\ReblogStrategyInterface;

/**
 * Reblogger class.
 * @author shugo
 *
 */
abstract class AbstractReblogger implements RebloggerInterface
{
    /**
     * Tumblr client.
     * @var TumblrClient
     */
    protected $client;
    
    /**
     * Reblog strategy
     * @var ReblogStrategyInterface
     */
    protected $reblogStrategy;
    
    /**
     * {@inheritdoc}
     */
    public function setClient(TumblrClient $client)
    {
        $this->client = $client;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setReblogStrategy(ReblogStrategyInterface $reblogStrategy)
    {
        $this->reblogStrategy = $reblogStrategy;
    }

    /**
     * {@inheritdoc}
     */
    public function reblog($blogName, array $post, array $options = null)
    {
        if ($this->reblogStrategy){
            if ($this->reblogStrategy->canReblog($post)){
                return $this->reblogPost($blogName, $post, $options);
            }
        }else{
            return $this->reblogPost($blogName, $post, $options);
        }
        
        return false;
    }
    
    /**
     * Reblog the post from post array.
     * 
     * @param string $blogName
     * @param array $post
     * 
     * @return array the response array
     */
    protected function reblogPost($blogName, array $post, array $options = null)
    {
        $id = $post['id'];
        $reblogKey = $post['reblog_key'];
        
        return $this->client->reblogPost($blogName, $id, $reblogKey, $options);
    }
}