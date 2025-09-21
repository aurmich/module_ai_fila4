<?php

declare(strict_types=1);

namespace Modules\AI\Filament\Pages;

<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 901402b (.)
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use RuntimeException;
use Filament\Actions\Action;
use Filament\Facades\Filament;
<<<<<<< HEAD
use Filament\Forms\Contracts\HasForms;
=======
use Filament\Forms\Form;
=======
use Filament\Schemas\Schema;
=======
use BackedEnum;
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use RuntimeException;
use Filament\Actions\Action;
use Filament\Facades\Filament;
<<<<<<< HEAD
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
>>>>>>> a12f125f4a (.)
=======
use Filament\Forms\Form;
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Contracts\HasForms;
=======
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Modules\Xot\Filament\Pages\XotBasePage;
>>>>>>> origin/develop
>>>>>>> 901402b (.)
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Modules\AI\Actions\CompletionAction;
use Modules\AI\Actions\SentimentAction;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
use Modules\Xot\Filament\Pages\XotBasePage;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $completionForm
=======
<<<<<<< HEAD
<<<<<<< HEAD
 * @property \Filament\Forms\Form $form
 * @property \Filament\Forms\Form $completionForm
>>>>>>> 901402b (.)
 */
class Completion extends XotBasePage implements HasForms
{

<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
    
    // protected string $view = 'ai::filament.pages.completion';
=======
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';
    
    // protected string $view = 'ai::filament.pages.completion';
=======
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $completionForm
=======
 * @property \Filament\Forms\Form $form
 * @property \Filament\Forms\Form $completionForm
>>>>>>> b93ef594b4 (.)
 */
class Completion extends XotBasePage implements HasForms
{

<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'ai::filament.pages.completion';
>>>>>>> a12f125f4a (.)
=======
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';
    
    // protected string $view = 'ai::filament.pages.completion';
>>>>>>> b93ef594b4 (.)
=======
use Webmozart\Assert\Assert;

/**
 * @property ComponentContainer $form
 * @property ComponentContainer $completionForm
 */
class Completion extends XotBasePage implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'ai::filament.pages.completion';
>>>>>>> origin/develop
>>>>>>> 901402b (.)

    public ?array $completionData = [];

    public function mount(): void
    {
<<<<<<< HEAD
        // $this->view = 'ai::filament.pages.completion';
        $this->completionForm->fill();
    }

    public function completionForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('prompt')
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        // $this->view = 'ai::filament.pages.completion';
        $this->completionForm->fill();
=======
        $this->fillForms();
>>>>>>> origin/develop
    }

    public function completionForm(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< HEAD
=======
=======
        // $this->view = 'ai::filament.pages.completion';
>>>>>>> b93ef594b4 (.)
        $this->completionForm->fill();
    }

    public function completionForm(Form $form): Form
    {
<<<<<<< HEAD
        return $schema
            ->components([
>>>>>>> a12f125f4a (.)
=======
        return $form
            ->schema([
>>>>>>> b93ef594b4 (.)
                Textarea::make('prompt')
=======
                Forms\Components\Textarea::make('prompt')
>>>>>>> origin/develop
>>>>>>> 901402b (.)
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

<<<<<<< HEAD
            $action = new CompletionAction;
=======
<<<<<<< HEAD
            $action = new CompletionAction;
=======
            $action = new CompletionAction();
>>>>>>> origin/develop
>>>>>>> 901402b (.)
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

<<<<<<< HEAD
            $action = new SentimentAction;
=======
<<<<<<< HEAD
            $action = new SentimentAction;
=======
            $action = new SentimentAction();
>>>>>>> origin/develop
>>>>>>> 901402b (.)
            $result = $action->execute($prompt);

            $this->dispatch('sentiment-completed', result: $result);
        } catch (Halt $exception) {
            // Form validation failed
        }
    }

    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
        if ($user === null) {
            throw new RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! $user instanceof Model) {
            throw new RuntimeException('L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.');
<<<<<<< HEAD
=======
=======
        if (null === $user) {
            throw new \RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! $user instanceof Model) {
            throw new \RuntimeException('L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.');
>>>>>>> origin/develop
>>>>>>> 901402b (.)
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
