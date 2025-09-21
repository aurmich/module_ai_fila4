<?php

declare(strict_types=1);

namespace Modules\AI\Filament\Pages;

<<<<<<< HEAD
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\Action;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use BackedEnum;
=======
>>>>>>> a12f125f4a (.)
=======
use BackedEnum;
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\FileUpload;
use Filament\Actions\Action;
=======
>>>>>>> origin/develop
>>>>>>> 901402b (.)
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Modules\Xot\Filament\Pages\XotBasePage;
<<<<<<< HEAD
=======
=======
use Filament\Pages\Actions\Action;
use Modules\Xot\Filament\Pages\XotBasePage;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
>>>>>>> origin/develop
>>>>>>> 901402b (.)
use Webmozart\Assert\Assert;

use function Safe\file_get_contents;

class FineTuning extends XotBasePage
{
<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog';

    protected string $view = 'ai::filament.pages.fine-tuning';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-cog';
=======
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog';
>>>>>>> a12f125f4a (.)
=======
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-cog';
>>>>>>> b93ef594b4 (.)

    protected string $view = 'ai::filament.pages.fine-tuning';
=======
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $view = 'ai::filament.pages.fine-tuning';
>>>>>>> origin/develop
>>>>>>> 901402b (.)

    public string $learning_rate = '0.001';

    public int $batch_size = 32;

    public int $epochs = 10;

    public string $dataset = 'dataset1';

    /** @var TemporaryUploadedFile */
    public $dataset_file;

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
     * Safe translation helper that returns string.
     */
    private function safeTranslate(string $key): string
    {
        $translation = __($key);
        if (is_string($translation)) {
            return $translation;
        }
        if (is_array($translation) && count($translation) > 0) {
            return (string) reset($translation);
        }

        return $key;
    }

    /**
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 901402b (.)
     * Schema del form.
     */
    protected function getFormSchema(): array
    {
        return [
            TextInput::make('learning_rate')
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
                ->label('Learning Rate')
                ->required()
                ->numeric()
                ->minValue(0)
                ->helperText('Set the learning rate for fine-tuning'),

            TextInput::make('batch_size')
                ->label('Batch Size')
                ->required()
                ->numeric()
                ->minValue(1)
                ->helperText('Number of samples per batch'),

            TextInput::make('epochs')
                ->label('Epochs')
                ->required()
                ->numeric()
                ->minValue(1)
                ->helperText('Number of training epochs'),

            Select::make('dataset')
                ->label('Dataset')
                ->options([
                    'dataset1' => 'Dataset 1',
                    'dataset2' => 'Dataset 2',
                ])
                ->required(),
            FileUpload::make('dataset_file')
                ->label('Dataset File')
                ->required()
                ->helperText('Upload the dataset file for training'),
<<<<<<< HEAD
=======
=======
                ->label(__('ai::fine_tuning.learning_rate'))  // Usiamo la traduzione per il label
                ->required()
                ->numeric()
                ->minValue(0)
                ->helperText(__('ai::fine_tuning.learning_rate_helper')),

            TextInput::make('batch_size')
                ->label(__('ai::fine_tuning.batch_size'))  // Traduzione per batch size
                ->required()
                ->numeric()
                ->minValue(1)
                ->helperText(__('ai::fine_tuning.batch_size_helper')),

            TextInput::make('epochs')
                ->label(__('ai::fine_tuning.epochs'))  // Traduzione per epochs
                ->required()
                ->numeric()
                ->minValue(1)
                ->helperText(__('ai::fine_tuning.epochs_helper')),

            Select::make('dataset')
                ->label(__('ai::fine_tuning.dataset'))  // Traduzione per dataset
                ->options([
                    'dataset1' => __('ai::fine_tuning.dataset1'),
                    'dataset2' => __('ai::fine_tuning.dataset2'),
                ])
                ->required(),
            Forms\Components\FileUpload::make('dataset_file')
                ->label(__('ai::fine_tuning.dataset_file'))
                ->required()
                ->helperText(__('ai::fine_tuning.dataset_file_helper')),
>>>>>>> origin/develop
>>>>>>> 901402b (.)
        ];
    }

    /**
     * Avvia il processo di fine-tuning.
     */
    public function startFineTuning(): void
    {
        $data = [
            'learning_rate' => (float) $this->learning_rate,
            'batch_size' => (int) $this->batch_size,
            'epochs' => (int) $this->epochs,
            'dataset' => $this->dataset,
        ];

        if ($this->dataset_file) {
            $data['dataset_file'] = $this->dataset_file->getRealPath(); // Percorso del file caricato
        }

        Assert::string($apiEndpoint = Config::get('ai.backend_api.fine_tuning_url'));

        $response = $this->sendFineTuningRequest($data, $apiEndpoint);

        if ($response->successful()) {
            Notification::make()
<<<<<<< HEAD
                ->title('Success')
                ->body('Fine-tuning started successfully')
=======
<<<<<<< HEAD
                ->title('Success')
                ->body('Fine-tuning started successfully')
=======
                ->title(__('ai::fine_tuning.success_title'))  // Traduzione per il titolo di successo
                ->body(__('ai::fine_tuning.success_body'))    // Traduzione per il messaggio di successo
>>>>>>> origin/develop
>>>>>>> 901402b (.)
                ->success()
                ->send();
        } else {
            Notification::make()
<<<<<<< HEAD
                ->title('Error')
                ->body('Fine-tuning failed to start')
=======
<<<<<<< HEAD
                ->title('Error')
                ->body('Fine-tuning failed to start')
=======
                ->title(__('ai::fine_tuning.error_title'))  // Traduzione per il titolo di errore
                ->body(__('ai::fine_tuning.error_body'))    // Traduzione per il messaggio di errore
>>>>>>> origin/develop
>>>>>>> 901402b (.)
                ->danger()
                ->send();
        }
    }

    protected function sendFineTuningRequest(array $data, string $endpoint): Response
    {
        Assert::string($dataset_file = $data['dataset_file']);
        Assert::string($content = file_get_contents($dataset_file));

        return Http::attach('dataset_file', $content, basename($dataset_file))
            ->post($endpoint, $data);
    }

    /**
     * Restituisce le azioni del form, come il pulsante per avviare il fine-tuning.
     */
    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
<<<<<<< HEAD
                ->label('Start Fine-tuning')
=======
<<<<<<< HEAD
                ->label('Start Fine-tuning')
=======
                ->label(__('ai::fine_tuning.action_label'))
>>>>>>> origin/develop
>>>>>>> 901402b (.)
                ->action('startFineTuning')
                ->color('primary'),
        ];
    }
}
