<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\StoryResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\StoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStory extends CreateRecord
{
    protected static ?string $title = 'Tambah Story';

    protected static string $resource = StoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
