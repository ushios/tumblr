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
     * @param object $post The tumblr post.
     */
    public function canReblog($post);
}