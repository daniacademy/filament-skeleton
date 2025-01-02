<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Role;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Seguridad';

    public static function shouldRegisterNavigation(): bool
    {
        $user = User::getActiveUserInstance();
        return $user && $user->can('view_any_user');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->rule(Password::default())
                    ->required(fn($context) => $context === 'create')
                    ->dehydrateStateUsing(
                        fn($state) => $state === '' ? null : $state
                    ),
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->options(function () {
                        $user = User::getActiveUserInstance();
                        if ($user && $user->isSuperAdmin()) {
                            return Role::pluck('name', 'id');
                        }
                        return Role::getAdministrativeRole()
                            ->pluck('name', 'id');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('roles.name'),
                TextColumn::make('created_at'),
                TextColumn::make('updated_at'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->query(User::whereHas('roles', function (Builder $query) {
                $user = User::getActiveUserInstance();
                if ($user && $user->isSuperAdmin()) {
                    return $query;
                }
                $query->whereIn(
                    'name',
                    Role::getAdministrativeRole()->pluck('name')
                );
            }));
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
