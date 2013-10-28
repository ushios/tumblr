<?php
namespace Ushios\Component\Tumblr\Reblog\Strategy;

use Doctrine\Common\Cache\CacheProvider;

/**
 * Reblog almost post but once.
 * @author shugo
 *
 */
class IgnoreDuplicateReblogStrategy extends AbstractReblogStrategy
{
    /**
     * Cache client.
     * @var CacheProvider
     */
    protected $cache;
    
    /**
     * Term.
     * @var int
     */
    protected $term;
    
    /**
     * {@inheritdoc}
     */
    public function canReblog(array $post)
    {
        $cacheKey = $this->makeCacheKey($post);
        $cached = $this->cache->fetch($cacheKey);
        
        if ($cached) return false;
        
        $this->cache->save($cacheKey, '1', $this->term);
        return true;
    }
    
    /**
     * Set cache client.
     * 
     * @param CacheProvider $cache Cache client.
     */
    public function setCache(CacheProvider $cache)
    {
        $this->cache = $cache;
    }
    
    /**
     * Set cache term.
     * @param int $time
     */
    public function setTerm($time)
    {
        $this->term = $time;
    }
    
    /**
     * Make cache key.
     * @param array $post
     * @return string
     */
    protected function makeCacheKey(array $post)
    {
        $reblogKey = $post['reblog_key'];
        return get_class($this) . $reblogKey;
    }
}