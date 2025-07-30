<?php

use App\Models\Doctor;
use App\Models\DoctorRole;
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
        Schema::create('doctor_doctor_role', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Doctor::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(DoctorRole::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_doctor_role');
    }
};
