<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_sub_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_type_id')->references('id')->on('service_types')->ondelete('cascade');
            $table->foreignId('service_id')->references('id')->on('services')->ondelete('cascade');
            $table->string('sub_type_name');
            $table->float('price')->nullable();
            $table->integer('status')->default(1)->comment('1:Active, 0:Blocked');
            $table->softDeletes();
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
        Schema::dropIfExists('service_sub_types');
    }
}
