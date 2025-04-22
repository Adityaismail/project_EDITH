<?php

namespace App\Filament\Clusters\HalamanHome\Resources\FeedbackResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedback extends CreateRecord
{
    protected static ?string $title = 'Tambah Feedback';

    protected static string $resource = FeedbackResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
