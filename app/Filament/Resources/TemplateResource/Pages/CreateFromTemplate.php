<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use Filament\Forms\Form;
use Illuminate\Support\Js;
use Filament\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Section;
use App\Filament\Resources\TemplateResource;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class CreateFromTemplate extends Page
{
    use InteractsWithFormActions;
    use InteractsWithRecord;

    protected static string $resource = TemplateResource::class;

    protected static string $view = 'filament.resources.template-resource.pages.create-from-template';

    public ?array $data = [];

    public string $class;
    
    public function mount(int | string $record): void 
    {
        $this->record = $this->resolveRecord($record);

        $this->class = $this->getClassFile($this->record->class_name);

        $this->fillForm();
    }

    protected function fillForm(): void
    {
        $this->callHook('beforeFill');

        $this->form->fill();

        $this->callHook('afterFill');
    }

    public function getTitle(): string
    {
        $record = $this->getRecord();
        return $record->name;
    }

    private function getClassFile(string $class): string
    {
        return 'app\\Filament\\Resources\\TemplateResource\\Templates\\' . $class;
    }

    public function form(Form $form): Form
    {
        
        return $form
            ->schema([
                Section::make($this->class::getSchema())
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('Create')
            ->label('Create')
            ->action(function() {
                $docView = $this->class::$docView;
                $validated = $this->validate();
                $data = $validated['data'];
                return response()->streamDownload(function () use ($docView, $data) {
                    echo Pdf::loadView($docView, $data)->stream();
                }, 'document.pdf');
            });
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.cancel.label'))
            ->alpineClickHandler('document.referrer ? window.history.back() : (window.location.href = ' . Js::from($this->previousUrl ?? static::getResource()::getUrl()) . ')')
            ->color('gray');
    }

}
