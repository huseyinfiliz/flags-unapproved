
<?php

namespace FlagToUnapproved\Listeners;

use Flarum\Flags\Event\Created as FlagCreated;
use Flarum\Flags\Flag;

class FlagListener
{
    public function handle(FlagCreated $event)
    {
        $post = $event->flag->post;

        if ($post) {
            $flagCount = Flag::where('post_id', $post->id)->count();

            if ($flagCount >= 2) {
                $post->is_approved = false;
                $post->save();
            }
        }
    }
}
