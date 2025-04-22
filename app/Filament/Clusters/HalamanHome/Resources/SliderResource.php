<?php

namespace App\Filament\Clusters\HalamanHome\Resources;

use App\Filament\Clusters\HalamanHome;
use App\Filament\Clusters\HalamanHome\Resources\SliderResource\Pages;
use App\Filament\Clusters\HalamanHome\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\Action;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Slider';

    protected static ?string $recordTitleAttribute = 'judul';

    protected static ?string $cluster = HalamanHome::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Fieldset::make('Information')
                            ->schema([
                                TextInput::make('crumb')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('judul')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('subjudul')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('nama_produk')
                                    ->required()
                                    ->maxLength(255),
                                FileUpload::make('image_path')
                                    ->label('Gambar')
                                    ->maxFiles(1)
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                    ])
                                    ->directory('section_satu')
                                    ->disk('public')
                                    ->required()
                                    ->panelLayout('grid'),
                                Fieldset::make('Sales')
                                    ->schema([
                                        Repeater::make('sales')
                                        ->relationship('sales')
                                        ->schema([
                                            TextInput::make('nama')
                                                ->required()
                                                ->maxLength(255),
                                            FileUpload::make('image_path')
                                                ->label('Gambar')
                                                ->maxFiles(1)
                                                ->imageEditor()
                                                ->imageEditorAspectRatios([
                                                    '16:9',
                                                ])
                                                ->directory('sales')
                                                ->disk('public')
                                                ->required()
                                                ->panelLayout('grid'),
                                        ])->columnSpanFull()
                                    ]),
                                Toggle::make('is_active')
                                    ->label('Status')
                                    ->required(),
                            ])->columns(1)
                    ]),
                    Section::make([
                        Placeholder::make('keterangan_pengisian')
                            ->label('Petunjuk Pengisian')
                            ->content(new HtmlString('
                                <ul>
                                    <li>1. <strong>Crumb</strong>: Masukkan text yang akan muncul di breadcrumb.</li>
                                    <li>2. <strong>Judul</strong>: Buat judul yang menarik dan mencerminkan produk dengan tepat.</li>
                                    <li>3. <strong>Sub Judul</strong>: Buat sub judul yang menarik dan mencerminkan produk dengan tepat.</li>
                                    <li>4. <strong>Gambar</strong>: Masukkan gambar yang akan muncul di halaman home.</li>
                                    <li>5. <strong>Sales</strong>: Tambahkan gambar dan nama sales untuk menarik perhatian pengguna.</li>
                                    <li>6. <strong>Status</strong>: Aktifkan status untuk menampilkan informasi di halaman home.</li>
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
                TextColumn::make('crumb')
                    ->label('Crumb')
                    ->searchable(),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                TextColumn::make('subjudul')
                    ->label('Sub Judul')
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
