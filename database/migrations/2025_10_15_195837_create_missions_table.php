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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->date('launch_date');
            $table->string('launch_site_name');
            $table->float('launch_latitude');
            $table->float('launch_longitude');

            $table->date('landing_date');
            $table->string('landing_site_name');
            $table->float('landing_latitude');
            $table->float('landing_longitude');

            $table->string('command_module');
            $table->string('lunar_module');
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
