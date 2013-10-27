<?php
namespace Ushios\Component\Tumblr\Reblog\Strategy;

/**
 * Reblog strategy class interface.
 * @author shugo
 *
 */
interface ReblogStrategyInterface
{
    /**
     * Judge the post reblog or not.
     * 
     * @param array $post The tumblr post.
     */
    public function canReblog(array $post);
}