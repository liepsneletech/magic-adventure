<?php

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('orders', function (Blueprint $table) {
    //         $table->id();
    //         $table->enum('status', Order::STATUS)->default(0);
    //         $table->foreignId('user_id')->constrained()->onDelete('cascade');
    //         $table->foreignId('offer_id')->constrained()->onDelete('cascade');
    //         $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
    //         $table->text('order_json');
    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('order_json');
            $table->smallInteger('status')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
