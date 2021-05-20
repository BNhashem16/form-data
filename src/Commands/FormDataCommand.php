<?php

namespace Bnhashem\FormData\Commands;

use Illuminate\Console\Command;

class FormDataCommand extends Command
{
    public $signature = 'form-data';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
