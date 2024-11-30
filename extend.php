
<?php

namespace FlagToUnapproved;

use Flarum\Extend;
use Flarum\Flags\Event\Created as FlagCreated;
use Flarum\Flags\Flag;

return [
    (new Extend\Event())
        ->listen(FlagCreated::class, function (FlagCreated $event) {
            $post = $event->flag->post;

            if ($post) {
                $flagCount = Flag::where('post_id', $post->id)->count();

                if ($flagCount >= 2) {
                    $post->is_approved = false;
                    $post->save();
                }
            }
        }),
];
