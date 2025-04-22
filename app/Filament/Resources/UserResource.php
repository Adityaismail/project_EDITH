<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\Action;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $recordTitleAttribute = 'name';

    public static function canAccess(): bool
    {
        return Auth::user()->role == true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Informasi')
                    ->schema([
                        Split::make([
                            Section::make([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('password')
                                    ->password()
                                    ->required()
                                    ->maxLength(255),
                                Toggle::make('role')
                                    ->required(),
                                DateTimePicker::make('email_verified_at')
                                    ->default(now()),
                            ]),
                            Section::make([
                                Placeholder::make('keterangan_pengisian')
                                    ->label('Petunjuk Pengisian')
                                    ->content(new HtmlString('
                                    <ul>
                                        <li> 1. <strong>Nama</strong>: Masukkan nama user.</li>
                                        <li> 2. <strong>Phone</strong>: Masukkan nomor telepon user.</li>
                                        <li> 3. <strong>Email</strong>: Masukkan email user.</li>
                                        <li> 4. <strong>Password</strong>: Masukkan password user.</li>
                                        <li> 5. <strong>Role</strong>: Pilih role user.</li>
                                        <li> 6. <strong>Email Verified At</strong>: Defaultnya adalah sekarang.</li>
                                    </ul>
                                    '))
                            ])->grow(),
                        ])->from('md')->columnSpanFull()
                        ])
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                ImageColumn::make('avatar_url')
                    ->label('Avatar')
                    ->circular(),
                TextColumn::make('name')
                    ->searchable(),
                IconColumn::make('role')
                    ->boolean(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->visibleFrom('md')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        true => 'Admin',
                        false => 'User',
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
                    ->modalHeading(fn (): string => 'Informasi User')
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
                //     Tables\Actions\DeleteBulkAction::make()
                //     ->color('danger')
                //     ->icon('heroicon-o-trash')
                //     ->tooltip('Delete')
                //     ->label('Delete'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
