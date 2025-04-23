<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\StoryResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\StoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStories extends ListRecords
{
    protected static ?string $title = 'Halaman Tentang Kami';

    protected static string $resource = StoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
