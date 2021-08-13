<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('staffs', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
    
                $table->string('Name')->nullable();
                $table->integer('Age')->nullable();
                $table->integer('Salary')->nullable();
                $table->string('Phone')->nullable();
            
                
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
