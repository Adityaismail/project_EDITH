<?php

namespace App\Filament\Clusters\HalamanHome\Resources\FeedbackResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedback extends ListRecords
{
    protected static ?string $title = 'Halaman Home';

    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
