<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Js;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;

class CreateFromTemplate extends Page
{
    use InteractsWithFormActions;
    use InteractsWithRecord;

    protected static string $resource = TemplateResource::class;

    protected static string $view = 'filament.resources.template-resource.pages.create-from-template';

    public ?array $data = [];

    public string $class;

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->getClassFile();

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

    private function getClassFile(): void
    {
        $namespace = 'app\\Filament\\Resources\\TemplateResource\\Templates\\';
        $class = $namespace.$this->record->class_name;

        $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        if (file_exists(base_path($path).'.php')) {
            $this->class = $class;
        } else {
            abort(404);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make($this->class::getSchema())
                    ->columns(2),
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
            ->label('Buat')
            ->action(function () {
                return $this->generatePdf();
            });
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.cancel.label'))
            ->alpineClickHandler('document.referrer ? window.history.back() : (window.location.href = '.Js::from($this->previousUrl ?? static::getResource()::getUrl()).')')
            ->color('gray');
    }

    protected function generatePdf(): StreamedResponse|false
    {
        $data = $this->form->getState();

        try {
            $view = $this->class::$view;
            $pdf = Pdf::loadView($view, $data);

            Notification::make()
                ->success()
                ->title('Surat berhasil dibuat')
                ->send();

            $filename = $this->getRecord()->name.'.pdf';

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, $filename);
        } catch (Throwable $exception) {
            Notification::make()
                ->danger()
                ->title('Maaf terjadi kesalahan')
                ->send();

            return false;
        }
    }
}
