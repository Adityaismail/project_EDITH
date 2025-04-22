<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SosialMediaResource\Pages;
use App\Filament\Resources\SosialMediaResource\RelationManagers;
use App\Models\SosialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\Facades\Auth;

class SosialMediaResource extends Resource
{
    protected static ?string $model = SosialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationLabel = 'Sosial Media';

    protected static ?string $navigationGroup = 'Master Data';
    
    protected static ?string $recordTitleAttribute = 'name';

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
                        FileUpload::make('image_path')
                            ->label('Gambar')
                            ->required()
                            ->image()
                            ->disk('public')
                            ->directory('sosial_media')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '4:3',
                            ])
                            ->columnSpanFull(),
                        TextInput::make('name')
                            ->required()
                            ->placeholder('Masukkan nama')
                            ->label('Nama'),
                        TextInput::make('url')
                            ->placeholder('Masukkan url')
                            ->label('URL'),
                        MarkdownEditor::make('deskripsi')
                            ->placeholder('Masukkan deskripsi')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Status')
                            ->required(),
                    ]),
                    Section::make([
                        Placeholder::make('keterangan_pengisian')
                            ->label('Petunjuk Pengisian')
                            ->content(new HtmlString('
                                <ul>
                                    <li>1. <strong>Gambar</strong>: Unggah gambar yang mewakili sosial media. Pastikan gambar memiliki rasio aspek 4:3 untuk hasil terbaik.</li>
                                    <li>2. <strong>Nama</strong>: Masukkan nama sosial media yang ingin ditambahkan. Pastikan nama tersebut mudah dikenali dan sesuai dengan identitas sosial media.</li>
                                    <li>3. <strong>URL</strong>: Masukkan URL lengkap dari sosial media. Pastikan URL tersebut valid dan dapat diakses.</li>
                                    <li>4. <strong>Deskripsi</strong>: Berikan deskripsi singkat mengenai sosial media. Deskripsi ini dapat mencakup tujuan atau fitur utama dari sosial media tersebut.</li>
                                    <li>5. <strong>Status</strong>: Aktifkan toggle jika sosial media ini sudah siap digunakan. Jika belum, biarkan toggle dalam posisi nonaktif.</li>
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
                    ->url(route('filament.admin.resources.sosial-media.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Image'),
                TextColumn::make('name')
                    ->weight(FontWeight::Bold)
                    ->label('Nama')
                    ->searchable(),
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
                    TextColumn::make('deskripsi')
                        ->label('Deskripsi')
                        ->weight(FontWeight::Bold)
                        ->searchable(),
                    TextColumn::make('url')
                        ->label('URL')
                        ->weight(FontWeight::Bold)
                        ->searchable(),
                ])->collapsed(),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
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
                    ->modalHeading(fn (): string => 'Informasi Sosial Media')
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
            'index' => Pages\ListSosialMedia::route('/'),
            'create' => Pages\CreateSosialMedia::route('/create'),
            'edit' => Pages\EditSosialMedia::route('/{record}/edit'),
        ];
    }
}
