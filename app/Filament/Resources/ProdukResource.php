<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $navigationLabel = 'Produk';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Informasi')
                        ->schema([
                            Split::make([
                                Section::make([
                                    Select::make('kategori_id')
                                        ->relationship('kategori', 'nama_kategori', fn (Builder $query) => $query->where('is_active', true))
                                        ->label('Kategori')
                                        ->required(),
                                    TextInput::make('nama')
                                        ->label('Nama')
                                        ->required(),
                                    TextInput::make('harga')
                                        ->label('Harga')
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
                                            <li> 1. <strong>Kategori</strong>: Pilih kategori produk.</li>
                                            <li> 2. <strong>Nama</strong>: Masukkan nama produk.</li>
                                            <li> 3. <strong>Harga</strong>: Masukkan harga produk.</li>
                                            <li> 4. <strong>Status</strong>: Aktifkan toggle jika produk ini sudah siap digunakan.</li>
                                        </ul>
                                        '))
                                        ->columnSpanFull(),
                                ])->grow(),
                            ])->from('md')
                        ]),
                    Wizard\Step::make('Gambar')
                        ->schema([
                            Split::make([
                                Section::make([
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
                                    MarkdownEditor::make('deskripsi')
                                        ->label('Deskripsi')
                                        ->required(),
                                ]),
                                Section::make([
                                    Placeholder::make('keterangan_pengisian')
                                        ->label('Petunjuk Pengisian')
                                        ->content(new HtmlString('
                                        <ul>
                                            <li> 1. <strong>Gambar</strong>: Masukkan gambar produk.</li>
                                            <li> 2. <strong>Deskripsi</strong>: Jelaskan produk secara ringkas namun informatif.</li>
                                        </ul>
                                        '))
                                ])->grow(),
                            ])->from('md')
                        ]),
                    Wizard\Step::make('Link')
                        ->schema([
                            Repeater::make('produk_urls')
                                ->label('Link')
                                ->relationship('produk_urls')
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Nama')
                                        ->required(),
                                    TextInput::make('url')
                                        ->label('Link')
                                        ->placeholder('https://')
                                        ->required(),
                                ])
                                ->columns(2)
                                ->required(),
                        ]),
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateActions([
                Action::make('create')
                    ->label('Tambah')
                    ->url(route('filament.admin.resources.produks.create'))
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
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->weight(FontWeight::Bold),
                TextColumn::make('harga')
                    ->label('Harga')
                    ->numeric(decimalPlaces: 0)
                    ->prefix('Rp. '),
                TextColumn::make('produk_urls.name')
                    ->label('Link')
                    ->badge(),
                Stack::make([
                    TextColumn::make('kategori.nama_kategori')
                        ->label('Kategori')
                        ->badge()
                        ->color('success'),
                    TextColumn::make('deskripsi')
                        ->label('Deskripsi')
                        ->visibleFrom('md'),
                ])->collapsed(),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                SelectFilter::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama_kategori'),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
