
<?php

namespace FlagToUnapproved;

use Illuminate\Contracts\Events\Dispatcher;
use Flarum\Extend;

return [
    (new Extend\ServiceProvider())
        ->register(Providers\EventServiceProvider::class)
];
