<?php

namespace App\Filament\Clusters\HalamanGallery\Resources;

use App\Filament\Clusters\HalamanGallery;
use App\Filament\Clusters\HalamanGallery\Resources\HeaderResource\Pages;
use App\Filament\Clusters\HalamanGallery\Resources\HeaderResource\RelationManagers;
use App\Models\HeaderGallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class HeaderResource extends Resource
{
    protected static ?string $model = HeaderGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Header';

    protected static ?string $recordTitleAttribute = 'header';

    protected static ?string $pluralRecordTitleAttribute = 'Header';

    protected static ?string $cluster = HalamanGallery::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('header')
                            ->label('Header')
                            ->required(),
                        MarkdownEditor::make('subheader')
                            ->label('Sub Header')
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Status')
                            ->required(),
                    ]),
                    Section::make([
                        Placeholder::make('keterangan_pengisian')
                            ->label('Petunjuk Pengisian')
                            ->content(new HtmlString('
                                <ul>
                                    <li>1. <strong>Header:</strong> Masukkan header yang akan ditampilkan di halaman gallery.</li>
                                    <li>2. <strong>Sub Header:</strong> Masukkan sub header yang akan ditampilkan di halaman gallery.</li>
                                    <li>3. <strong>Status:</strong> Aktifkan status untuk menampilkan informasi di halaman gallery.</li>
                                </ul>
                            '))
                    ])->grow(),
                ])->from('md')
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextColumn::make('header')
                    ->label('Header')
                    ->searchable(),
                TextColumn::make('subheader')
                    ->label('Sub Header')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diubah')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Aktif',
                        '0' => 'Tidak Aktif',
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
                    ->modalHeading(fn (): string => 'Informasi Gallery')
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
            'index' => Pages\ListHeaders::route('/'),
            'create' => Pages\CreateHeader::route('/create'),
            'edit' => Pages\EditHeader::route('/{record}/edit'),
        ];
    }
}
