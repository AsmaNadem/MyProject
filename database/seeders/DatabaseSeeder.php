<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

//employees
//$table->id();
//$table->string('employee_name');
//$table->string('employee_CV')->default(1);
//$table->string('employee_number');
//$table->string('employee_date');
//$table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
//$table->foreignId('programming_language_id')->constrained()->onDelete('cascade');
//$table->foreignId('project_id')->constrained()->onDelete('cascade');
//$table->timestamps();
//});

//pl
//$table->id();
//            $table->string('name');
//            $table->string('image');
//            $table->timestamps();

//pro
//$table->id();
//$table->string('name');
//$table->string('logo');
//$table->string('description');
//$table->string('link');
//$table->foreignId('programming_language_id')->constrained()->onDelete('cascade');;
//$table->timestamps();

//task
//$table->id();
//            $table->string('task_name');
//            $table->string('task_status');
//            $table->string('start_date');
//            $table->string('duration');
//            $table->foreignId('project_id')->constrained()->onDelete('cascade');
//            $table->foreignId('employee_id')->nullable()->constrained();
//            $table->timestamps();
