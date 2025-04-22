<?php

namespace App\Filament\Clusters\HalamanHome\Resources;

use App\Filament\Clusters\HalamanHome;
use App\Filament\Clusters\HalamanHome\Resources\FeedbackResource\Pages;
use App\Filament\Clusters\HalamanHome\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Feedback';

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $cluster = HalamanHome::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Toggle::make('is_active')
                            ->label('Status')
                            ->required(),
                        FileUpload::make('image_path')
                            ->label('Gambar')
                            ->required()
                            ->image()
                            ->disk('public')
                            ->directory('feedback')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '4:3',
                            ])
                            ->columnSpanFull(),
                        TextInput::make('nama')
                            ->label('Nama')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Phone')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('rating')
                            ->label('Rating')
                            ->maxLength(255),
                        MarkdownEditor::make('message')
                            ->label('Komentar')
                            ->columnSpanFull(),
                    ])->columns(2),
                    Section::make([
                        Placeholder::make('keterangan_pengisian')
                            ->label('Petunjuk Pengisian')
                            ->content(new HtmlString('
                                <ul>
                                    <li>1. <strong>Status:</strong> Aktifkan toggle ini jika feedback sudah siap untuk digunakan atau dipublikasikan.</li>
                                    <li>2. <strong>Nama:</strong> Masukkan nama produk yang relevan dengan feedback ini.</li>
                                    <li>3. <strong>Email:</strong> Masukkan alamat email yang valid untuk keperluan komunikasi lebih lanjut.</li>
                                    <li>4. <strong>Phone:</strong> Masukkan nomor telepon yang dapat dihubungi jika diperlukan klarifikasi lebih lanjut.</li>
                                    <li>5. <strong>Rating:</strong> Berikan penilaian produk dengan skala yang telah ditentukan (misalnya 1-5).</li>
                                    <li>6. <strong>Gambar:</strong> Unggah gambar produk yang relevan untuk mendukung feedback yang diberikan.</li>
                                    <li>7. <strong>Comment:</strong> Tulis komentar atau ulasan yang mendetail mengenai pengalaman Anda dengan produk ini.</li>
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
                ImageColumn::make('image_path')
                    ->label('Gambar'),
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->visibleFrom('md')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->visibleFrom('md')
                    ->searchable(),
                TextColumn::make('rating')
                    ->label('Rating')
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
            ->headerActions([
                Action::make('refresh')
                    ->label('Refresh')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->action(fn () => null)
                    ->after(fn ($livewire) => $livewire->dispatch('refreshTable')),
            ])
            ->filters([
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Aktif',
                        '0' => 'Tidak Aktif',
                    ]),
            ])
            ->actions([
                ViewAction::make()
                    ->color('info')
                    ->icon('heroicon-o-magnifying-glass-plus')
                    ->tooltip('View')
                    ->modalHeading(fn (): string => 'Informasi Feedback')
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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}
