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
        Schema::create('sent_email_history', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("subject");
            $table->longText("message");
            $table->enum("status", ["sent", "pending", "failed"])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_email_history');
    }
};
