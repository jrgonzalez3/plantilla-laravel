<?php
namespace App\Filament\Pages\Tenancy;
use App\Models\Company;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class RegisterCompany extends RegisterTenant
{

    public static function getLabel(): string
    {
        return "Register Company";
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
            ]);
    }

    protected function handlweRegistration(array $data): Company
    {
        $company = Company::create($data);

        $company->members()->attach(Auth::user());
        return $company;
    }
    protected function handleRegistration(array $data): Company
    {
        $team = Company::create($data);

        $team->members()->attach(Auth::user());

        return $team;
    }

}