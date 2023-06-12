<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'patients',
            function (Blueprint $table) {
                $table->id();
                $table->string('lastname', 200);
                $table->string('firstname', 200);
                $table->enum('gender', ['male', 'female', 'diverse']);
                $table->date('birthdate');
                $table->integer('age', false, true);
                $table->string('insurancenumber', 10);
                $table->string('doctor', 200)->nullable();
                $table->boolean('smoker')->nullable();
                $table->boolean('pregnant')->nullable();
                $table->date('laborvaluedate')->nullable();
                $table->decimal('size', 5, 2, true)->nullable();
                $table->decimal('weight', 5, 2, true)->nullable();
                $table->integer('puls', false, true)->default(1);
                $table->integer('diastolic', false, true)->default(1);
                $table->integer('systolic', false, true)->default(1);
                $table->decimal('creatinine', 8, 2, true)->default(0.01);
                $table->integer('gfr', false, true)->default(1);
                $table->enum('gfralgorithm', ['useMdrd', 'useCockcroftGault'])->default('useMdrd');
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
