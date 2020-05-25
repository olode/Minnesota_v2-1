
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