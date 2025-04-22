<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Facades\Auth;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Kategori';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $recordTitleAttribute = 'nama_kategori';

    public static function canAccess(): bool
    {
        return Auth::user()->role == true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Informasi Kategori')
                    ->schema([
                        Split::make([
                            Section::make([
                                Select::make('nama_kategori')
                                    ->options([
                                        'Best Seller' => 'Best Seller',
                                        'New Produk' => 'New Produk',
                                        'Promo' => 'Promo',
                                    ])
                                    ->required(),
                                Select::make('slug')
                                    ->options([
                                        'best-seller' => 'best-seller',
                                        'new-produk' => 'new-produk',
                                        'promo' => 'promo',
                                    ])
                                    ->required(),
                                MarkdownEditor::make('deskripsi'),
                                Toggle::make('is_active')
                                    ->label('Status')
                                    ->required(),
                            ]),
                            Section::make([
                                Placeholder::make('keterangan_pengisian')
                                    ->label('Petunjuk Pengisian')
                                    ->content(new HtmlString('
                                    <ul>
                                        <li> 1. <strong>Nama Kategori</strong>: Masukkan nama kategori yang jelas dan mudah dipahami.</li>
                                        <li> 2. <strong>Slug</strong>: Gunakan format huruf kecil dan strip (contoh: <code>kategori-baru</code>).</li>
                                        <li> 3. <strong>Deskripsi</strong>: Jelaskan kategori secara ringkas namun informatif.</li>
                                        <li> 4. <strong>Status</strong>: Aktifkan toggle jika kategori ini sudah siap digunakan.</li>
                                    </ul>
                                    '))
                                    ->columnSpanFull(),
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
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextColumn::make('nama_kategori')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->badge()
                    ->searchable(),
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
                SelectFilter::make('is_active')
                    ->options([
                        true => 'Aktif',
                        false => 'Tidak Aktif',
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
                    ->modalHeading(fn (): string => 'Informasi Kategori')
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
                // BulkActionGroup::make([
                //     DeleteBulkAction::make()
                //         ->color('danger')
                //         ->icon('heroicon-o-trash')
                //         ->tooltip('Delete')
                //         ->label('Delete'),
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}
