<?php

use App\Models\Sector;
use App\ReportStatus;
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
        Schema::create('report_spjs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('activity_date');
            $table->string('location');
            $table->foreignIdFor(Sector::class)->constrained();
            $table->integer('total_budget')->default(0);
            $table->integer('total_realization')->default(0);
            $table->text('purpose')->nullable();

            $table->enum('status', ReportStatus::cases())
                ->default(ReportStatus::Draft);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_spjs');
    }
};
