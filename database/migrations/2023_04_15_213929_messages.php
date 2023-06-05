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
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('message_id');
            $table->integer('sender_id');
            $table->integer('receive_id');
            $table->string('message');
            $table->integer('status')->default(0); // 0 => Sending 1 => Received, 2 => Seen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
