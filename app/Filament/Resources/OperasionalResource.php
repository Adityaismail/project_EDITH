<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperasionalResource\Pages;
use App\Filament\Resources\OperasionalResource\RelationManagers;
use App\Models\Operasional;
use App\Models\Alamat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\Action;
class OperasionalResource extends Resource
{
    protected static ?string $model = Operasional::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Operasional';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $recordTitleAttribute = 'alamat.nama_perusahaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Select::make('alamat_id')
                            ->label('Alamat')
                            ->required()
                            ->options(Alamat::all()->pluck('nama_perusahaan', 'id'))
                            ->searchable(),
                        TextInput::make('hari')
                            ->required()
                            ->maxLength(255),
                        TimePicker::make('jam_mulai')
                            ->label('Jam Mulai')
                            ->required()
                            ->seconds(false),
                        TimePicker::make('jam_selesai')
                            ->label('Jam Selesai')
                            ->required()
                            ->seconds(false),
                        Toggle::make('is_active')
                            ->label('Status')
                            ->required(),
                    ]),
                    Section::make([
                        Placeholder::make('keterangan_pengisian')
                            ->label('Petunjuk Pengisian')
                            ->content(new HtmlString('
                                <ul>
                                    <li>1. <strong>Status</strong>: Aktifkan toggle ini jika operasional sudah siap untuk digunakan atau dipublikasikan.</li>
                                    <li>2. <strong>Alamat ID</strong>: Pilih alamat. Pastikan alamat tersebut benar dan dapat diakses.</li>
                                    <li>3. <strong>Hari</strong>: Masukkan hari operasional yang diinginkan. Pastikan hari tersebut sesuai dengan jadwal operasional.</li>
                                    <li>4. <strong>Jam Mulai</strong>: Masukkan jam mulai operasional. Pastikan jam mulai sesuai dengan waktu yang telah ditentukan.</li>
                                    <li>5. <strong>Jam Selesai</strong>: Masukkan jam selesai operasional. Pastikan jam selesai tidak lebih awal dari jam mulai.</li>
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
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextColumn::make('alamat.nama_perusahaan')
                    ->label('Alamat')
                    ->numeric(),
                TextColumn::make('hari')
                    ->label('Hari')
                    ->searchable(),
                TextColumn::make('jam_mulai')
                    ->label('Jam Mulai')
                    ->visibleFrom('md')
                    ->time('H:i'),
                TextColumn::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->visibleFrom('md')
                    ->time('H:i'),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('alamat_id')
                    ->label('Alamat')
                    ->options(Alamat::all()->pluck('nama_perusahaan', 'id'))
                    ->searchable(),
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
                    ->modalHeading(fn (): string => 'Informasi Operasional')
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
            'index' => Pages\ListOperasionals::route('/'),
            'create' => Pages\CreateOperasional::route('/create'),
            'edit' => Pages\EditOperasional::route('/{record}/edit'),
        ];
    }
}
