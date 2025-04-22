<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterResource\Pages;
use App\Filament\Resources\FooterResource\RelationManagers;
use App\Models\Footer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class FooterResource extends Resource
{
    protected static ?string $model = Footer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Footer';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
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
                            ->directory('footer')
                            ->disk('public')
                            ->required()
                            ->panelLayout('grid'),
                        MarkdownEditor::make('content')
                            ->label('Content')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('copyright')
                            ->label('Copyright')
                            ->required()
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
                                <li> 1. <strong>Gambar</strong>: Pilih gambar untuk footer.</li>
                                <li> 2. <strong>Content</strong>: Masukkan content untuk footer.</li>
                                <li> 3. <strong>Copyright</strong>: Masukkan copyright untuk footer.</li>
                                <li> 4. <strong>Status</strong>: Aktifkan toggle jika footer ini sudah siap digunakan.</li>
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
                    ->url(route('filament.admin.resources.footers.create'))
                    ->icon('heroicon-o-plus'),
            ])
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                ImageColumn::make('image_path')
                    ->label('Gambar'),
                TextColumn::make('content')
                    ->label('Content')
                    ->html()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('copyright')
                    ->label('Copyright')
                    ->html()
                    ->visibleFrom('md')
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
                    ->label('Status')
                    ->options([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif',
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
                    ->modalHeading(fn (): string => 'Informasi Footer')
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
            'index' => Pages\ListFooters::route('/'),
            'create' => Pages\CreateFooter::route('/create'),
            'edit' => Pages\EditFooter::route('/{record}/edit'),
        ];
    }
}
