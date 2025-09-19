<?php

declare(strict_types=1);

namespace Modules\AI\Filament\Pages;

use Filament\Schemas\Schema;
<<<<<<< HEAD
use Filament\Forms\Components\Textarea;
use RuntimeException;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
=======
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use RuntimeException;
use Filament\Actions\Action;
use Filament\Facades\Filament;
>>>>>>> 7bf22f1 (.)
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Modules\AI\Actions\CompletionAction;
use Modules\AI\Actions\SentimentAction;
use Modules\Xot\Filament\Pages\XotBasePage;
use Webmozart\Assert\Assert;

/**
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $completionForm
 */
class Completion extends XotBasePage implements HasForms
{
<<<<<<< HEAD
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'ai::filament.pages.completion';
=======

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
    
    // protected string $view = 'ai::filament.pages.completion';
>>>>>>> 7bf22f1 (.)

    public ?array $completionData = [];

    public function mount(): void
    {
<<<<<<< HEAD
=======
        // $this->view = 'ai::filament.pages.completion';
>>>>>>> 7bf22f1 (.)
        $this->completionForm->fill();
    }

    public function completionForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('prompt')
                    ->required(),
            ])
            ->model($this->getUser())
            ->statePath('completionData');
    }

    public function completion(): void
    {
        try {
            $data = $this->completionForm->getState();
            Assert::string($prompt = $data['prompt']);

            $action = new CompletionAction;
            $result = $action->execute($prompt);

            $this->dispatch('completion-completed', result: $result);
        } catch (Halt $exception) {
            // Form validation failed
        }
    }

    public function sentiment(): void
    {
        try {
            $data = $this->completionForm->getState();
            Assert::string($prompt = $data['prompt']);

            $action = new SentimentAction;
            $result = $action->execute($prompt);

            $this->dispatch('sentiment-completed', result: $result);
        } catch (Halt $exception) {
            // Form validation failed
        }
    }

    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

        if ($user === null) {
            throw new RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! $user instanceof Model) {
            throw new RuntimeException('L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.');
        }

        /* @var Authenticatable&Model $user */
        return $user;
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('completion')
                ->label('Generate Completion')
                ->action('completion')
                ->color('primary'),

            Action::make('sentiment')
                ->label('Analyze Sentiment')
                ->action('sentiment')
                ->color('secondary'),
        ];
    }
}
