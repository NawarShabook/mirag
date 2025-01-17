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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('city');
            $table->string('property_type');
            $table->string('sector_code')->nullable();
            $table->string('block_number')->nullable();
            $table->string('building_number')->nullable();
            $table->string('manual_location')->nullable();
            $table->string('status')->default('waiting');
            $table->text('problem_information')->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('workshop_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('maintenance_service_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('heavy_machine_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
