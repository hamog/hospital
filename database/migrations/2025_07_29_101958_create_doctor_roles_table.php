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
        Schema::create('doctor_roles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->boolean('required')->default(true);
            $table->tinyInteger('quota');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('doctor_roles')->insert([
            [
                'title' => 'هوشیبی',
                'required' => true,
                'quota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'جراح',
                'required' => true,
                'quota' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'مشاور',
                'required' => false,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_roles');
    }
};
