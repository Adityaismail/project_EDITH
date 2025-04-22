<?php

namespace App\Filament\Clusters\HalamanHome\Resources\FeedbackResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeedback extends EditRecord
{
    protected static ?string $title = 'Edit Feedback';

    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->icon('heroicon-o-trash')
                ->color('danger'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
