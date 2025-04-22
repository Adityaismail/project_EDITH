<?php

namespace App\Filament\Resources\ProdukResource\Pages;

use App\Filament\Resources\ProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListProduks extends ListRecords
{
    protected static ?string $title = 'Daftar Produk';

    protected static string $resource = ProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Tambah'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Best Seller' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('kategori', function (Builder $query) {
                    $query->where('nama_kategori', 'Best Seller');
                })),
            'New Produk' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('kategori', function (Builder $query) {
                    $query->where('nama_kategori', 'New Produk');
                })),
            'Promo' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('kategori', function (Builder $query) {
                    $query->where('nama_kategori', 'Promo');
                })),
        ];
    }
}
