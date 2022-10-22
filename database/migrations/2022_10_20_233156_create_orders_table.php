<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->ondelete('cascade');
            $table->foreignId('service_id')->references('id')->on('services')->ondelete('cascade');
            $table->string('service_type');
            $table->string('sub_type')->nullable();
            $table->integer('quantity');
            $table->decimal('total');
            $table->text('notes')->nullable();
            $table->integer('order_delivered_by')->nullable();
            $table->datetime('booked_at');
            $table->datetime('approved_at')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->integer('status')->default(1)->comment('1:Pending, 2:Approved, 3:Completed, 4:Cancelled');
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
}
