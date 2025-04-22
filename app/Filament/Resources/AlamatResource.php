<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlamatResource\Pages;
use App\Filament\Resources\AlamatResource\RelationManagers;
use App\Models\Alamat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\FileUpload;

class AlamatResource extends Resource
{
    protected static ?string $model = Alamat::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationLabel = 'Alamat';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $recordTitleAttribute = 'nama_perusahaan';

    public static function canAccess(): bool
    {
        return Auth::user()->role == true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Select::make('user_id')
                            ->label('Nama User')
                            ->relationship('user', 'name')
                            ->required(),
                        TextInput::make('nama_perusahaan')
                            ->label('Nama Perusahaan')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('telepon')
                            ->label('No. Telp')
                            ->required()
                            ->maxLength(255),
                        MarkdownEditor::make('alamat')
                            ->label('Alamat')
                            ->required()
                            ->columnSpanFull(),
                        FileUpload::make('image_path')
                            ->label('Header Logo')
                            ->maxFiles(1)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                            ])
                            ->directory('alamat')
                            ->disk('public')
                            ->required()
                            ->panelLayout('grid')
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Status')
                            ->required(),
                    ])->columns(2),
                    Section::make([
                        Placeholder::make('keterangan_pengisian')
                            ->label('Petunjuk Pengisian')
                            ->content(new HtmlString('
                                <ul>
                                    <li>1. <strong>Nama User:</strong> Pilih nama user yang ingin dihubungi.</li>
                                    <li>2. <strong>Nama Perusahaan:</strong> Masukkan nama perusahaan yang ingin dihubungi.</li>
                                    <li>3. <strong>Email:</strong> Masukkan email yang ingin dihubungi.</li>
                                    <li>4. <strong>No. Telp:</strong> Masukkan nomor telepon yang ingin dihubungi.</li>
                                    <li>5. <strong>Alamat:</strong> Masukkan alamat perusahaan yang ingin dihubungi.</li>
                                    <li>6. <strong>Status:</strong> Aktifkan toggle ini jika alamat perusahaan sudah siap untuk digunakan atau dipublikasikan.</li>
                                </ul>
                            '))
                            ->columnSpanFull(),
                    ])->grow(),
                ])->from('md')
                ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateActions([
                Action::make('create')
                    ->label('Tambah')
                    ->url(route('filament.admin.resources.alamats.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama User'),
                TextColumn::make('nama_perusahaan')
                    ->weight(FontWeight::Bold),
                TextColumn::make('is_active')
                    ->label('Status')
                    ->color(fn (bool $state): string => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Active' : 'Nonactive')
                    ->badge()
                    ->icon(fn (bool $state): string => match ($state) {
                        true => 'heroicon-m-check-circle',
                        false => 'heroicon-m-x-circle',
                    }),
                Stack::make([
                    TextColumn::make('email')
                        ->icon('heroicon-m-envelope')
                        ->searchable(),
                    TextColumn::make('telepon')
                        ->icon('heroicon-m-phone')
                        ->searchable(),
                    TextColumn::make('alamat')
                        ->icon('heroicon-m-map-pin')
                        ->searchable(),
                ])->collapsed(),
            ])
            ->contentGrid([
                'md' => 3,
            ])
            ->filters([
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Nonactive',
                    ]),
            ])
            ->headerActions([
                Action::make('refresh')
                    ->label('Refresh')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->action(fn () => null)
                    ->after(fn ($livewire) => $livewire->dispatch('refreshTable')),
            ])
            ->actions([
                ViewAction::make()
                    ->color('info')
                    ->icon('heroicon-o-magnifying-glass-plus')
                    ->tooltip('View')
                    ->modalHeading(fn (): string => 'Informasi Alamat')
                    ->hiddenLabel()
                    ->slideOver(),
                EditAction::make()
                    ->color('info')
                    ->icon('heroicon-o-pencil-square')
                    ->tooltip('Edit')
                    ->hiddenLabel()
                    ->slideOver(),
                DeleteAction::make()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->tooltip('Delete')
                    ->hiddenLabel(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlamats::route('/'),
            'create' => Pages\CreateAlamat::route('/create'),
            'edit' => Pages\EditAlamat::route('/{record}/edit'),
        ];
    }
}
