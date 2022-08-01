<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->index();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('other_name', 25)->nullable();
            $table->string('email', 50)->unique();
            $table->string('gender', 10);
            $table->string('phone', 12);
            $table->date('birth_date');
            $table->string('marital_status', 10);
            $table->string('origin', 50);
            $table->string('residence', 50);
            $table->string('nation', 50);
           // $table->integer('job_id', 5)->index();
            $table->string('skills', 500);
            $table->string('qualification', 100);
            $table->string('institution', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('qualification_obtained', 100);
            $table->string('nysc', 100);
            $table->string('company_name', 100);
            $table->string('company_address', 300);
            $table->date('empsdate');
            $table->date('empedate');
            $table->string('position_held', 100);
            $table->string('department', 100);
            $table->string('salary', 50);
            $table->string('why_not', 500);
            $table->string('cv_path', 100);
            $table->string('letter_path', 100);
            $table->boolean('owner')->default(false);
            $table->string('photo_path', 100)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
