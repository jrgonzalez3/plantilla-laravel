<?php
namespace App\Filament\Resources\Pages\Tenancy;
use App\Models\Company;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
class RegisterCompany extends RegisterTenant
{

    public static function getLabel(): string
    {
        return Form::label("Register Company");
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
            ]);
    }

    protected function handleRegistration(array $data): Company
    {
        $company = Company::create($data);

        $company->members()->attach(auth()->user());
    }

}