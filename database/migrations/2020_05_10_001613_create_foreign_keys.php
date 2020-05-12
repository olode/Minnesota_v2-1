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
		Schema::table('specializations', function(Blueprint $table) {
			$table->foreign('branch_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('specializations', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('materials', function(Blueprint $table) {
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
			$table->foreign('branch_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('branch_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('section_id')->references('id')->on('sections')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_calsses', function(Blueprint $table) {
			$table->foreign('semester_id')->references('id')->on('semesters')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_calsses', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_calsses', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('classes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->foreign('mark_type_id')->references('id')->on('mark_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('classes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('branch_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('classes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('attendances', function(Blueprint $table) {
			$table->foreign('lecture_id')->references('id')->on('lectures')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('news_announcements', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('classes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('semesters', function(Blueprint $table) {
			$table->foreign('year_id')->references('id')->on('years')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('semesters', function(Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('section_id')->references('id')->on('sections')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('semester_id')->references('id')->on('semesters')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('year_id')->references('id')->on('years')
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
		Schema::table('specializations', function(Blueprint $table) {
			$table->dropForeign('specializations_branch_id_foreign');
		});
		Schema::table('specializations', function(Blueprint $table) {
			$table->dropForeign('specializations_stage_id_foreign');
		});
		Schema::table('materials', function(Blueprint $table) {
			$table->dropForeign('materials_section_id_foreign');
		});
		Schema::table('materials', function(Blueprint $table) {
			$table->dropForeign('materials_specialization_id_foreign');
		});
		Schema::table('stages', function(Blueprint $table) {
			$table->dropForeign('stages_branch_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_branch_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_section_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_specialization_id_foreign');
		});
		Schema::table('student_calsses', function(Blueprint $table) {
			$table->dropForeign('student_calsses_semester_id_foreign');
		});
		Schema::table('student_calsses', function(Blueprint $table) {
			$table->dropForeign('student_calsses_student_id_foreign');
		});
		Schema::table('student_calsses', function(Blueprint $table) {
			$table->dropForeign('student_calsses_class_id_foreign');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->dropForeign('student_marks_student_id_foreign');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->dropForeign('student_marks_mark_type_id_foreign');
		});
		Schema::table('student_marks', function(Blueprint $table) {
			$table->dropForeign('student_marks_class_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_branch_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_role_id_foreign');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->dropForeign('lectures_material_id_foreign');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->dropForeign('lectures_class_id_foreign');
		});
		Schema::table('attendances', function(Blueprint $table) {
			$table->dropForeign('attendances_lecture_id_foreign');
		});
		Schema::table('news_announcements', function(Blueprint $table) {
			$table->dropForeign('news_announcements_class_id_foreign');
		});
		Schema::table('semesters', function(Blueprint $table) {
			$table->dropForeign('semesters_year_id_foreign');
		});
		Schema::table('semesters', function(Blueprint $table) {
			$table->dropForeign('semesters_specialization_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_stage_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_section_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_semester_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_material_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_teacher_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_year_id_foreign');
		});
	}
}