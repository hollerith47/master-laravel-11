# SoftDeletes
add soft delete to migration table then add use SoftDeletes to the model,
after that use the method to retrieve onlyTrashed or withTrashed

users model
```php
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use  softDeletes;
    
}
```

users table migration
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // all table culmn with
            $table->softDeletes();
            
        });

    }

};

```

retrieve Data on UserController
```php
// get only deleted data
$trash = User::onlyTrashed()->get();

// get all data with deleted
$all = User::withTrashed()->get();
```
# Restore Trashed Data or Delete permanently

```php
// userController
// Restore one by id
$trash = User::withTrashed()->find(1)->restore();

// Delete permanently
$user = User::withTrashed()->find(1) //first find the deleted data  then for delete
$user->forceDelete();
```

# Custom ContactStoreRequest with the customer error messsages
```php
// ContactStoreRequest
<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:20', 'min:5'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Hey please fill the name field',
            'name.max' => 'The max length of name have to be 20',
            'name.min' => 'The min length of name have to be 5',
            'email.required' => 'Hey email is required',
            'subject.required' => 'Hey the subject is required',
        ];
    }
}

```
# Populating Form Data
retrieving previous form data is possible in blade with the old method 
```php

{{ old("key_name")}}

<div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" value={{ old("subject") }}>
</div>
<div class="mb-3">
    <label for="msg" class="form-label">Message</label>
    <textarea id="msg" class="form-control" name="message" >{{ old("message") }}</textarea>
</div>
```

# Creating model with migration
```bash
php artisan make:model Modelname -m

#// for example for the Contact model with migration
php  artisan make:model Contact  -m
```
