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
        Schema::table('spjs', function (Blueprint $table) {
    $table->enum('status', ['pending', 'review', 'approved', 'rejected', 'revision'])
        ->default('pending');
    $table->text('admin_note')->nullable();
    $table->unsignedBigInteger('reviewed_by')->nullable();
    $table->timestamp('reviewed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spjs', function (Blueprint $table) {
            //
        });
    }
};
