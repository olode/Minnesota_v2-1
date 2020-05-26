
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***************start of view_student_classes***************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/


CREATE VIEW view_student_classes AS SELECT
    `students`.*,
    `student_calsses`.`id` AS `student_calsses_id` ,

    `classes`.`id` AS `class_id`,
    `classes`.`name` AS `class_name`,
    `classes`.`class_day`,
    `classes`.`starts_at` AS `class_starts_at`,
    `classes`.`ends_at` AS `class_ends_at`,
    `classes`.`year_id` AS `class_year_id`,
    `classes`.`teacher_id` AS `class_teacher_id`,


    `semesters`.`id` AS `semester_id`,
    `semesters`.`semester_code`,
    `semesters`.`title` AS `semester_title`,
    `semesters`.`starts_at` AS `semester_starts_at`,
    `semesters`.`end_at` AS `semester_end_at`,


    `materials`.`id` AS `material_id`,
    `materials`.`name` AS `material_name`,
    `materials`.`hours` AS `material_hours`,

    `specializations`.`name` AS `specialization_name`,

    `sections`.`name` AS `section_name`,

    `stages`.`id` AS `stage_id`,
    `stages`.`name` AS `stage_name`,


    `branches`.`id` AS `branche_id`,
    `branches`.`name` AS `branche_name`

FROM
    `students`
INNER JOIN `student_calsses` ON `student_calsses`.`student_id` = `students`.id

INNER JOIN `classes` ON `classes`.`id` = `student_calsses`.class_id

INNER JOIN `semesters` ON `semesters`.`id` = `classes`.semester_id

INNER JOIN `materials` ON `materials`.`id` = `classes`.material_id

INNER JOIN `specializations` ON `specializations`.`id` = `materials`.specialization_id

INNER JOIN `sections` ON `sections`.`id` = `specializations`.section_id

INNER JOIN `stages` ON `stages`.`id` = `sections`.stage_id

INNER JOIN `branches` ON `branches`.`id` = `stages`.branch_id


/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/****************end of view_student_classes****************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/


/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***************start of view_teacher_classes***************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/


CREATE VIEW view_teacher_classes AS SELECT
    `classes`.`id` AS `class_id` ,
    `classes`.`name` AS `class_name` ,
    `classes`.`teacher_id` AS `class_teacher_id` ,
    `classes`.`stage_id` AS `class_stage_id` ,
    `classes`.`section_id` AS `class_section_id` ,

    `stages`.`id` AS `stage_id` ,
    `stages`.`name` AS `stage_name` ,

    `sections`.`id` AS `section_id` ,
    `sections`.`name` AS `section_name` ,

    `specializations`.`id` AS `specialization_id` ,
    `specializations`.`name` AS `specialization_name` 

    

FROM
    `classes`
INNER JOIN `stages` ON `stages`.`id` = `classes`.stage_id

INNER JOIN `sections` ON `sections`.`id` = `classes`.section_id

INNER JOIN `students` ON `students`.`section_id` = `classes`.section_id

INNER JOIN `specializations` ON `specializations`.`id` = `students`.specialization_id



/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/****************end of view_teacher_classes****************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/

/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***************start of view_student_details***************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/


CREATE VIEW view_student_details AS SELECT
    `students`.`id`,
    `students`.`first_name` ,
    `students`.`second_name` ,
    `students`.`last_name` ,
    `students`.`special_student_id` ,


    `specializations`.`id` AS `specialization_id` ,
    `specializations`.`name` AS `specialization_name` ,

    `sections`.`id` AS `section_id` ,
    `sections`.`name` AS `section_name` ,

    `stages`.`id` AS `stage_id` ,
    `stages`.`name` AS `stage_name` ,

    `branches`.`id` AS `branch_id` ,
    `branches`.`name` AS `branch_name` 

FROM
    `students`
INNER JOIN `specializations` ON `specializations`.`id` = `students`.specialization_id

INNER JOIN `sections` ON `sections`.`id` = `specializations`.section_id

INNER JOIN `stages` ON `stages`.`id` = `sections`.stage_id

INNER JOIN `branches` ON `branches`.`id` = `stages`.branch_id








/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/****************end of view_student_details****************/
/***********************************************************/
/***********************************************************/
/***********************************************************/
/***********************************************************/