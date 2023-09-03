<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Vulnerability;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            Vulnerability::MAIN_TABLE_NAME,
            function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string(Vulnerability::CODE);
                $table->string(Vulnerability::TITLE);
                $table->text(Vulnerability::OVERVIEW);
                $table->longText(Vulnerability::DESCRIPTION);
                $table->longText(Vulnerability::PREVENTION_GUIDE);
                $table->longText(Vulnerability::EXAMPLES_DESCRIPTION);
            })
        ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Vulnerability::MAIN_TABLE_NAME);
    }
};
