<?php

namespace App\Filament\Clusters\HalamanHome\Resources;

use App\Filament\Clusters\HalamanHome;
use App\Filament\Clusters\HalamanHome\Resources\BannerResource\Pages;
use App\Filament\Clusters\HalamanHome\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Banner';

    protected static ?string $recordTitleAttribute = 'text';

    protected static ?string $cluster = HalamanHome::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('text')
                            ->label('Text')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('header')
                            ->label('Header')
                            ->required()
                            ->maxLength(255),
                        MarkdownEditor::make('subheader')
                            ->label('Sub Header')
                            ->required(),
                        FileUpload::make('image_path')
                            ->label('Gambar')
                            ->maxFiles(1)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                            ])
                            ->directory('section_dua')
                            ->disk('public')
                            ->required()
                            ->panelLayout('grid'),
                        Toggle::make('is_active')
                            ->label('Status')
                            ->required(),
                    ]),
                    Section::make([
                        Placeholder::make('keterangan_pengisian')
                            ->label('Petunjuk Pengisian')
                            ->content(new HtmlString('
                                <ul>
                                    <li>1. <strong>Text</strong>: Masukkan text yang akan ditampilkan di banner.</li>
                                    <li>2. <strong>Header</strong>: Masukkan header yang akan ditampilkan di banner.</li>
                                    <li>3. <strong>Sub Header</strong>: Masukkan sub header yang akan ditampilkan di banner.</li>
                                    <li>4. <strong>Gambar</strong>: Masukkan gambar yang akan ditampilkan di banner.</li>
                                    <li>5. <strong>Status</strong>: Aktifkan status untuk menampilkan informasi di halaman home.</li>
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
                TextColumn::make('text')
                    ->label('Text')
                    ->searchable(),
                TextColumn::make('header')
                    ->label('Header')
                    ->searchable(),
                TextColumn::make('subheader')
                    ->label('Sub Header')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->modalHeading(fn (): string => 'Informasi Banner')
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
