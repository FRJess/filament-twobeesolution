<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('lastname')->required(),
                    TextInput::make('city')->required(),
                    Select::make('eye_color')
                    ->options([
                        'Brown'=>'Brown',
                        'Hazel'=>'Hazel',
                        'Green'=>'Green',
                        'Blue'=>'Blue',
                        'Gray'=>'Gray',
                        'Other'=>'Other',
                    ]),
                    Select::make('hair_color')
                    ->options([
                        'Black'=>'Black',
                        'Dark Brown'=>'Dark Brown',
                        'Medium Brown'=>'Medium Brown',
                        'Light Brown'=>'Light Brown',
                        'Dark Blonde'=>'Dark Blonde',
                        'Medium Blonde'=>'Medium Blonde',
                        'Light Blonde'=>'Light Blonde',
                        'Other'=>'Other',
                    ]),
                    TextInput::make('citizenship'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable(),
                TextColumn::make('lastname')->sortable(),
                TextColumn::make('city'),
                // TextColumn::make('eye_color'),
                TextColumn::make('hair_color'),
                BadgeColumn::make('eye_color')
                ->colors([
                    'primary' => 'Blue',
                    'secondary' => 'Gray',
                    'warning' => 'Brown',
                    'success' => 'Green',
                    'danger' => 'Hazel',
                ]),
                TextColumn::make('citizenship')->default('N/A'),
            ])
            ->filters([
                // SelectFilter::make('eye_color')->relationship('eye_color', 'name')
                SelectFilter::make('citizenship')
                ->multiple()
                ->options([
                    'italian' => 'Italian',
                    'american' => 'American',
                    'french' => 'French',
                ]),
                SelectFilter::make('hair_color')
                ->multiple()
                ->options([
                    'Black'=>'Black',
                    'Dark Brown'=>'Dark Brown',
                    'Medium Brown'=>'Medium Brown',
                    'Light Brown'=>'Light Brown',
                    'Dark Blonde'=>'Dark Blonde',
                    'Medium Blonde'=>'Medium Blonde',
                    'Light Blonde'=>'Light Blonde',
                    'Other'=>'Other',
                ]),
                SelectFilter::make('eye_color')
                ->multiple()
                ->options([
                    'Brown'=>'Brown',
                    'Hazel'=>'Hazel',
                    'Green'=>'Green',
                    'Blue'=>'Blue',
                    'Gray'=>'Gray',
                    'Other'=>'Other',
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                // FilamentExportBulkAction::make('export'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
