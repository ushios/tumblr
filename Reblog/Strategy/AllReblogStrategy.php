<?php
namespace Ushios\Component\Tumblr\Reblog\Strategy;

/**
 * Reblog all post.
 * @author shugo
 *
 */
class AllReblogStrategy extends AbstractReblogStrategy
{
    /**
     * {@inheritdoc}
     */
    public function canReblog(array $post)
    {
        return true;
    }
}