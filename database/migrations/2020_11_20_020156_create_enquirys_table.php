<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquirysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquirys', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("home_phone");
            $table->string("adress");
            $table->string("suburb");
            $table->string("post_code");
            $table->string("date_of_birth");
            $table->string("language_home");
            $table->string("parent_name");
            $table->string("parent_mobile");
            $table->string("parent_email");
            $table->string("parent_adress");
            $table->string("status")->default('disable');
            $table->timestamps();

            /** 
            Campos que correspodnen al enrolment process se 
            demoninan del EP1 - EP14 con la fecha y el estado
            */
            $table->date("ep1_date");
            $table->string("ep1_state")->default('Complete');

            $table->date("ep2_date");
            $table->string("ep2_state")->default('Complete');

            $table->date("ep3_date");
            $table->string("ep3_state")->default('Pending');

            $table->date("ep4_date");
            $table->string("ep4_state")->default('Complete');

            $table->date("ep5_date");
            $table->string("ep5_state")->default('Pending');

            $table->date("ep6_date");
            $table->string("ep6_state")->default('Pending');

            $table->date("ep7_date");
            $table->string("ep7_state")->default('Pending');

            $table->date("ep8_date");
            $table->string("ep8_state")->default('Pending');

            $table->date("ep9_date");
            $table->string("ep9_state")->default('Pending');

            $table->date("ep10_date");
            $table->string("ep10_state")->default('Pending');

            $table->date("ep11_date");
            $table->string("ep11_state")->default('Pending');

            $table->date("ep12_date");
            $table->string("ep12_state")->default('Pending');

            $table->date("ep13_date");
            $table->string("ep13_state")->default('Pending');

            $table->date("ep14_date");
            $table->string("ep14_state")->default('Pending');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enquirys');
    }
}
