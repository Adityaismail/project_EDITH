<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use App\Models\User;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Gallery';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $recordTitleAttribute = 'information';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Select::make('user_id')
                            ->label('Author')
                            ->options(User::all()->pluck('name', 'id'))
                            ->required(),
                        TextInput::make('information')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('image_path')
                            ->label('Gambar')
                            ->maxFiles(1)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                            ])
                            ->directory('produk')
                            ->disk('public')
                            ->required()
                            ->panelLayout('grid'),
                        MarkdownEditor::make('location')
                            ->label('Lokasi')
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
                                <li> 1. <strong>Author</strong>: Pilih author.</li>
                                <li> 2. <strong>Judul</strong>: Masukkan judul.</li>
                                <li> 3. <strong>Gambar</strong>: Masukkan gambar.</li>
                                <li> 4. <strong>Lokasi</strong>: Masukkan lokasi.</li>
                                <li> 5. <strong>Status</strong>: Aktifkan status.</li>
                            </ul>
                            '))
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
                    ->url(route('filament.admin.resources.galleries.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->width(100)
                    ->height(100),
                TextColumn::make('is_active')
                    ->label('Status')
                    ->alignEnd()
                    ->color(fn (bool $state): string => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Active' : 'Nonactive')
                    ->badge()
                    ->icon(fn (bool $state): string => match ($state) {
                        true => 'heroicon-m-check-circle',
                        false => 'heroicon-m-x-circle',
                    }),
                TextColumn::make('information')
                    ->label('Judul')
                    ->searchable()
                    ->weight(FontWeight::Bold),
                TextColumn::make('user.name')
                    ->label('Author')
                    ->badge()
                    ->color('success'),
                Stack::make([
                    TextColumn::make('location')
                    ->label('Lokasi'),
                    TextColumn::make('created_at')
                        ->label('Tanggal'),
                ])->collapsed(),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                SelectFilter::make('user_id')
                    ->label('Author')
                    ->options(User::all()->pluck('name', 'id')),
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
                    ->modalHeading(fn (): string => 'Informasi Produk')
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
