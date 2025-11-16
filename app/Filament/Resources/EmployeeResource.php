<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pegawai';

    protected static ?string $modelLabel = 'Pegawai';

    protected static ?string $pluralModelLabel = 'Data Pegawai';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([

            // Bagian 1: Informasi Pribadi
            Forms\Components\Section::make('Informasi Pribadi')
                ->schema([
                    Forms\Components\TextInput::make('nik')
                        ->label('NIK')
                        ->required()
                        ->minLength(8)
                        ->maxLength(16)
                        ->rule('regex:/^[0-9]+$/')
                        ->placeholder('Masukkan NIK dengan 8–16 digit angka')
                        ->validationMessages([
                            'required' => 'NIK wajib diisi.',
                            'min'      => 'NIK harus minimal 8 digit.',
                            'max'      => 'NIK harus maksimal 16 digit.',
                            'regex'    => 'NIK hanya boleh berisi angka.',
                        ]),

                    Forms\Components\TextInput::make('full_name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->placeholder('Masukkan Nama Lengkap')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->placeholder('Masukkan Email yang Valid')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('gender')
                        ->label('Jenis Kelamin')
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ])
                        ->required(),

                    Forms\Components\DatePicker::make('date_of_birth')
                        ->label('Tanggal Lahir')
                        ->nullable(),
                ])
                ->columns(2),


            // Bagian 2: Informasi Pekerjaan
            Forms\Components\Section::make('Informasi Pekerjaan')
                ->schema([
                    Forms\Components\Select::make('position')
                        ->label('Jabatan')
                        ->required()
                        ->options([
                            'Staff' => 'Staff',
                            'Admin' => 'Admin',
                            'Supervisor' => 'Supervisor',
                            'Manager' => 'Manager',
                            'Intern' => 'Intern',
                        ]),

                    Forms\Components\Select::make('division')
                        ->label('Divisi')
                        ->required()
                        ->options([
                            'HRD' => 'HRD',
                            'Finance' => 'Finance',
                            'IT' => 'IT',
                            'Marketing' => 'Marketing',
                            'Operation' => 'Operation',
                            'GA' => 'GA',
                        ]),

                    Forms\Components\DatePicker::make('date_of_joining')
                        ->label('Tanggal Bergabung')
                        ->required(),
                ])
                ->columns(2),


            // Bagian 3: Informasi Lainnya
            Forms\Components\Section::make('Lainnya')
                ->schema([
                    Forms\Components\TextInput::make('phone_number')
                        ->label('Nomor Telepon')
                        ->tel()
                        ->placeholder('Masukkan Nomor Telephone')
                        ->maxLength(16)
                        ->nullable(),

                    Forms\Components\Textarea::make('address')
                        ->label('Alamat')
                        ->placeholder('Contoh: Jl. Merdeka No. 45, RT 02 RW 01, Jakarta Selatan')
                        ->columnSpanFull()
                        ->nullable(),

                    Forms\Components\Select::make('employment_status')
                        ->label('Status Karyawan')
                        ->options([
                            'Aktif' => 'Aktif',
                            'Non-aktif' => 'Non-aktif',
                            'Resign' => 'Resign',
                            'Cuti' => 'Cuti',
                        ])
                        ->nullable(),

                    Forms\Components\TextInput::make('basic_salary')
                        ->label('Gaji Pokok')
                        ->numeric()
                        ->placeholder("Masukan Nominal Gaji Pokok")
                        ->nullable(),
                ])
                ->columns(2),

        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->sortable()
                    ->limit(16),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('gender')
                    ->label('JK')
                    ->formatStateUsing(fn(string $state) => $state === 'L' ? 'Laki-laki' : 'Perempuan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Manager' => 'success',
                        'Supervisor' => 'info',
                        'Admin' => 'warning',
                        'Staff' => 'gray',
                        'Intern' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('division')
                    ->label('Divisi'),
                Tables\Columns\TextColumn::make('date_of_joining')
                    ->label('Bergabung')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->label('TL')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employment_status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Non-aktif' => 'warning',
                        'Resign' => 'danger',
                        'Cuti' => 'info',
                    }),
                Tables\Columns\TextColumn::make('basic_salary')
                    ->label('Salary')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('division')
                    ->label('Divisi')
                    ->options([
                        'HRD' => 'HRD',
                        'Finance' => 'Finance',
                        'IT' => 'IT',
                        'Marketing' => 'Marketing',
                        'Operation' => 'Operation',
                        'GA' => 'GA',
                    ]),

                Tables\Filters\SelectFilter::make('position')
                    ->label('Jabatan')
                    ->options([
                        'Staff' => 'Staff',
                        'Admin' => 'Admin',
                        'Supervisor' => 'Supervisor',
                        'Manager' => 'Manager',
                        'Intern' => 'Intern',
                    ]),

                Tables\Filters\SelectFilter::make('employment_status')
                    ->label('Status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Non-aktif' => 'Non-aktif',
                        'Resign' => 'Resign',
                        'Cuti' => 'Cuti',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Belum ada data pegawai')
            ->emptyStateDescription('Mulai tambah pegawai pertama Anda')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Pegawai')
                    ->icon('heroicon-o-plus')
            ])
            ->paginated(10, 25, 50)
            ->striped()
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
