<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            
            // student information
            $table->string("first_name");
            $table->string("last_name");
            $table->string("home_phone");
            $table->string("adress");
            $table->string("suburb");
            $table->string("post_code");
            $table->string("date_of_birth");
            $table->string("language_home");
            $table->string("gender");
            $table->string("delivered");
            $table->string("subjet");
            $table->string("package");
            $table->string("type_package")->nullable();
            $table->string("know", 355)->nullable();
            // parent information
            $table->string("parent_name");
            $table->string("parent_iam");
            $table->string("parent_email")->unique();
            $table->string("parent_mobile");
            $table->string("parent_adress");
            
            // schooling information
            $table->string("school", 355);
            $table->string("grade");
            $table->string("teacher_name")->nullable();
            $table->string("teacher_contact")->nullable();
            $table->string("teacher_mobile")->nullable();
            
            // sin case of emergency
            $table->string("emergency_name");
            $table->string("emergency_relation");
            $table->string("emergency_mobile");
            $table->string("emergency_phone");
            
            // interventions del e1 - e7
            $table->string("interventions_e1");
            $table->string("interventions_attachmen_e1", 355)->nullable();
            $table->string("interventions_e2");
            $table->string("interventions_attachmen_e2", 355)->nullable();
            $table->string("interventions_e3");
            $table->string("interventions_attachmen_e3", 355)->nullable();
            $table->string("interventions_e4");
            $table->string("interventions_details_e4", 355)->nullable();
            $table->string("interventions_e5");
            $table->string("interventions_e6");
            $table->string("interventions_details_e6", 355)->nullable();
            $table->string("interventions_e7");
            
            // generals 
            $table->string("about");
            $table->string("notes", 355)->nullable();
            $table->string("terms");
            
            
            
            $table->timestamps();
            
            $table->bigInteger('enquiry_id')->unsigned();
            $table->foreign('enquiry_id')->references('id')->on('enquirys');
            
            
            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolments', function (Blueprint $table) {
            //
        });
    }
}
