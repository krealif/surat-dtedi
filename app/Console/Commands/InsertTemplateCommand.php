<?php

namespace App\Console\Commands;

use App\Models\Template;
use Illuminate\Support\Str;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;

class InsertTemplateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'template:insert-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert template information into database.';

    protected function getInput(): array
    {
        return [
            'name' => text(
                label: 'Template Name',
                required: true,
            ),

            'class_name' => text(
                label: 'Class Name',
                required: true,
            ),
        ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $input = $this->getInput();

        $template = new Template();
        $template->name = $input['name'];
        $template->class_name = Str::studly($input['class_name']);
        $template->save();

        $this->components->info(sprintf('%s inserted into database successfully.', $input['name']));
    }
}
