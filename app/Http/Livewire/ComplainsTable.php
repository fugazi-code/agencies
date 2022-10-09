<?php

namespace App\Http\Livewire;

use App\Models\Complains;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ComplainsTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                  ->sortable(),
            Column::make("Agency", "agency")
                  ->searchable()
                  ->sortable(),
            Column::make("Foreign agency", "foreign_agency")
                  ->searchable()
                  ->sortable(),
            Column::make("Company", "company")
                  ->searchable()
                  ->sortable(),
            Column::make("National id", "national_id")
                  ->searchable()
                  ->sortable(),
            Column::make("Passport", "passport")
                  ->searchable()
                  ->sortable(),
            Column::make("Full name", "full_name")
                  ->searchable()
                  ->sortable(),
            Column::make("Gender", "gender")
                  ->sortable(),
            Column::make("Birth date", "birth_date")
                  ->sortable(),
            Column::make("Contact person", "contact_person")
                  ->sortable(),
            Column::make("Occupation", "occupation")
                  ->sortable(),
            Column::make("Email address", "email_address")
                  ->sortable(),
            Column::make("Contact number", "contact_number")
                  ->sortable(),
            Column::make("Contact number2", "contact_number2")
                  ->sortable(),
            Column::make("Address abroad", "address_abroad")
                  ->sortable(),
            Column::make("Employer contact", "employer_contact")
                  ->sortable(),
            Column::make("Complaint", "complaint")
                  ->sortable(),
            Column::make("Image1", "image1")
                  ->sortable(),
            Column::make("Image2", "image2")
                  ->sortable(),
            Column::make("Image3", "image3")
                  ->sortable(),
            Column::make("Actual latitude", "actual_latitude")
                  ->sortable(),
            Column::make("Actual longitude", "actual_longitude")
                  ->sortable(),
            Column::make("Created at", "created_at")
                  ->sortable(),
            Column::make("Created at", "created_at")
                  ->sortable(),
            Column::make("Updated at", "updated_at")
                  ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Complains::query();
    }
}
