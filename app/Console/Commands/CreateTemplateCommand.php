<?php

namespace App\Console\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class CreateTemplateCommand extends GeneratorCommand
{
    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'template:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a template.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Template';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path().'/stubs/template.stub';
    }

    /**
     * Get the class name for the generator.
     *
     * @return string
     */
    protected function getClassName()
    {
        $input = $this->getNameInput();
        $name = Str::studly($input);

        if (str_starts_with($name, 'Surat')) {
            $name = ltrim($name, "Surat");
        }
        
        return $name;
    }

    /**
     * Get the view name for the generator.
     *
     * @return string
     */
    protected function getViewName()
    {
        return Str::kebab($this->getClassName());
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Filament\Resources\TemplateResource\Templates';
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceView(&$stub)
    {
        $stub = str_replace('{{ view }}', 'surat.'.$this->getViewName(), $stub);

        return $this;
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this
            ->replaceView($stub)
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $classname = $this->getClassName();
        // First we need to ensure that the given name is not a reserved word within the PHP
        // language and that the class name will actually be valid. If it is not valid we
        // can error now and prevent from polluting the filesystem using invalid files.
        if ($this->isReservedName($classname)) {
            $this->components->error('The name "'.$classname.'" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($classname);

        $path = $this->getPath($name);

        $viewPath = $this->viewPath('surat').'/'.$this->getViewName().'.blade.php';

        // Next, We will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((! $this->hasOption('force') ||
            ! $this->option('force')) &&
            $this->alreadyExists($classname)) {

            $this->components->error($this->type.' already exists.');

            return false;
        }

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));

        $info = $this->type;

        if (in_array(CreatesMatchingTest::class, class_uses_recursive($this))) {
            if ($this->handleTestCreation($path)) {
                $info .= ' and test';
            }
        }

        if (windows_os()) {
            $path = str_replace('/', '\\', $path);
        }

        $this->components->info(sprintf('%s [%s] created successfully.', $info, $path));

        // Generate View File
        if ((! $this->hasOption('force') ||
            ! $this->option('force')) &&
            $this->files->exists($viewPath)) {

            $this->components->error('View'.' already exists.');

            return false;
        }

        $this->files->put($viewPath, "<x-surat::document>\n  <!-- Write here -->\n</x-surat::document>");
    }
}
