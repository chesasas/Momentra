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

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('template_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('slug')->unique();
            $table->string('event_name');
            $table->string('bride_name');
            $table->string('groom_name');
            $table->date('date');
            $table->time('time');
            $table->text('location');
            $table->text('google_maps')->nullable();
            $table->longText('description')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('bride_photo')->nullable();
            $table->string('groom_photo')->nullable();
            $table->string('music_url')->nullable();
            $table->enum('status', [
                'draft',
                'pending_payment',
                'paid',
                'published',
                'cancelled'
            ])->default('draft');

            $table->timestamps();
            $table->softDeletes();
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
