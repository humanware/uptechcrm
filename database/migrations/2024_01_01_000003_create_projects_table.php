<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->text('requirements');
            $table->string('status')->default('sample');
            $table->string('sample_status')->default('sample_in_review');
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('manager_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('sales_owner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
