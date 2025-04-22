<?php

namespace App\Filament\Clusters\HalamanGallery\Resources;

use App\Filament\Clusters\HalamanGallery;
use App\Filament\Clusters\HalamanGallery\Resources\GalleryResource\Pages;
use App\Filament\Clusters\HalamanGallery\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use App\Models\User;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Stack;
use Carbon\Carbon;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Gallery';

    protected static ?string $cluster = HalamanGallery::class;

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
                        ->label('Tanggal')
                        ->formatStateUsing(fn (string $state): string => Carbon::parse($state)->format('d M Y')),
                ])->collapsed(),
            ])
            ->contentGrid([
                'md' => 2,
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
