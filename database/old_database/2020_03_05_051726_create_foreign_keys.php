<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('sections', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('specializations', function(Blueprint $table) {
			$table->foreign('section_id')->references('id')->on('sections')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('materials', function(Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('stages', function(Blueprint $table) {
			$table->foreign('branche_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('teacher_materials', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('teacher_materials', function(Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_materials', function(Blueprint $table) {
			$table->foreign('teacher_material_id')->references('id')->on('teacher_materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_materials', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		// Schema::table('mark_types', function(Blueprint $table) {
		// 	$table->foreign('student_mark')->references('id')->on('student_marks')
		// 				->onDelete('cascade')
		// 				->onUpdate('cascade');
		// });
		Schema::table('mark_types', function(Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('teacher_materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->foreign('mark_types_id')->references('id')->on('mark_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->foreign('student_material_id')->references('id')->on('student_materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('specialization_plan', function(Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('schedule', function(Blueprint $table) {
			$table->foreign('teacher_materials_id')->references('id')->on('teacher_materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('branche_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('attendances', function(Blueprint $table) {
			$table->foreign('lecture_id')->references('id')->on('lectures')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('sections_stage_id_foreign');
		});
		Schema::table('specializations', function(Blueprint $table) {
			$table->dropForeign('specializations_section_id_foreign');
		});
		Schema::table('materials', function(Blueprint $table) {
			$table->dropForeign('materials_specialization_id_foreign');
		});
		Schema::table('stages', function(Blueprint $table) {
			$table->dropForeign('stages_branche_id_foreign');
		});
		Schema::table('teacher_materials', function(Blueprint $table) {
			$table->dropForeign('teacher_materials_teacher_id_foreign');
		});
		Schema::table('teacher_materials', function(Blueprint $table) {
			$table->dropForeign('teacher_materials_material_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_specialization_id_foreign');
		});
		Schema::table('student_materials', function(Blueprint $table) {
			$table->dropForeign('student_materials_teacher_material_id_foreign');
		});
		Schema::table('student_materials', function(Blueprint $table) {
			$table->dropForeign('student_materials_student_id_foreign');
		});
		// Schema::table('mark_types', function(Blueprint $table) {
		// 	$table->dropForeign('mark_types_student_mark_foreign');
		// });
		Schema::table('mark_types', function(Blueprint $table) {
			$table->dropForeign('mark_types_material_id_foreign');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->dropForeign('student_marks_student_id_foreign');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->dropForeign('student_marks_mark_types_id_foreign');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->dropForeign('student_marks_student_material_id_foreign');
		});
		Schema::table('specialization_plan', function(Blueprint $table) {
			$table->dropForeign('specialization_plan_specialization_id_foreign');
		});
		Schema::table('schedule', function(Blueprint $table) {
			$table->dropForeign('schedule_teacher_materials_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_branche_id_foreign');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->dropForeign('lectures_material_id_foreign');
		});
		Schema::table('attendances', function(Blueprint $table) {
			$table->dropForeign('attendances_lecture_id_foreign');
		});
	}
}