<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestEmployees extends BaseWidget
{
    protected static ?string $heading = 'Pegawai Terbaru';
    public function table(Table $table): Table
    {
        return $table
            ->query(
               Employee::latest()->limit(5),
            )
            ->columns([
                // ...
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nama'),
                    

                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan'),
                    

                Tables\Columns\TextColumn::make('division')
                    ->label('Divisi'),
                    

                Tables\Columns\TextColumn::make('date_of_joining')
                    ->label('Tanggal Bergabung')
                    ->date('d M Y'),
                    
            ]);
    }
}
