tumblr
======

tumblr extensions.

---
# Dependencies

- [tumblr/tumblr](https://github.com/tumblr/tumblr.php)

# Usage

## Reblogger

    # reblogger.php
    
    <?php
    use Ushios\Component\Tumblr\Reblog\Reblogger;
    use Ushios\Component\Tumblr\Reblog\Strategy\AllReblogStrategy;
    
    $reblogger = new Reblogger();
    $client = new Tumblr\API\Client(CONSUMER_KEY, CONSUMER_SECRET);
    $client->setToken(TOKEN, TOKEN_SECRET);
    $reblogger->setClient($client);
    
    $strategy = new AllReblogStrategy(); // or ReblogStrategyInterface sub class.
    $reblogger->setReblogStrategy($strategy);
    
    $reblogger->reblog(BLOG_NAME, (array)$post); // reblog post

---
