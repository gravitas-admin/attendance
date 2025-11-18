CREATE database d_attendance;




CREATE TABLE `d_attendance`.`login` (
  `user_name` VARCHAR(10) NOT NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`user_name`));


ALTER TABLE `d_attendance`.`login` 
CHANGE COLUMN `user_name` `user_name` VARCHAR(10) NOT NULL DEFAULT 'admin' ,
CHANGE COLUMN `password` `password` VARCHAR(45) NULL DEFAULT 'pass' ;

CREATE TABLE `d_attendance`.`student` (
  `id` INT NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `gender` VARCHAR(45) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `contact` VARCHAR(45) NOT NULL,
  `adharnumber` VARCHAR(50) NOT NULL,
  `joining date` DATE NOT NULL,
  `current status` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`));
CREATE TABLE `d_attendance`.`teacher` (
  `id` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `gender` VARCHAR(45) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `contact` VARCHAR(45) NOT NULL,
  `adharnumber` VARCHAR(45) NOT NULL,
  `joining date` DATE NOT NULL,
  `status` VARCHAR(50) NOT NULL,
  `salary` INT NOT NULL,
  PRIMARY KEY (`id`));
CREATE TABLE `d_attendance`.`student_teacher` (
  `id` INT NOT NULL,
  `studentid` INT NOT NULL,
  `teacherid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `studentid_idx` (`studentid` ASC) VISIBLE,
  INDEX `teacherid_idx` (`teacherid` ASC) VISIBLE,
  CONSTRAINT `studentid`
    FOREIGN KEY (`studentid`)
    REFERENCES `d_attendance`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `teacherid`
    FOREIGN KEY (`teacherid`)
    REFERENCES `d_attendance`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
CREATE TABLE `d_attendance`.`course` (
  `id` INT NOT NULL,
  `coursename` VARCHAR(50) NOT NULL,
  `batch` VARCHAR(45) NOT NULL,
  `duration` VARCHAR(45) NOT NULL,
  `fees` INT NOT NULL,
  PRIMARY KEY (`id`));
CREATE TABLE `d_attendance`.`schedule` (
  `id` INT NOT NULL,
  `courseid` INT NOT NULL,
  `start time` TIMESTAMP(6) NOT NULL,
  `end time` TIMESTAMP(6) NOT NULL,
  `teacher notes` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `courseid_idx` (`courseid` ASC) VISIBLE,
  CONSTRAINT `courseid`
    FOREIGN KEY (`courseid`)
    REFERENCES `d_attendance`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `d_attendance`.`attendance` (
  `id` INT NOT NULL,
  `studentid` INT NOT NULL,
  `scheduleid` INT NOT NULL,
  `attended by` VARCHAR(50) NOT NULL,
  `date` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `studentid_idx` (`studentid` ASC) VISIBLE,
  INDEX `scheduleid_idx` (`scheduleid` ASC) VISIBLE,
  CONSTRAINT `fk_studentid`
    FOREIGN KEY (`studentid`)
    REFERENCES `d_attendance`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_scheduleid`
    FOREIGN KEY (`scheduleid`)
    REFERENCES `d_attendance`.`schedule` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE `d_attendance`.`schedule_teacher` (
  `id` INT NOT NULL,
  `scheduleid` INT NOT NULL,
  `teacherid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_scheduleid_idx` (`scheduleid` ASC) VISIBLE,
  INDEX `fk_teacherid_idx` (`teacherid` ASC) VISIBLE,
  CONSTRAINT `fk1_scheduleid`
    FOREIGN KEY (`scheduleid`)
    REFERENCES `d_attendance`.`schedule` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk1_teacherid`
    FOREIGN KEY (`teacherid`)
    REFERENCES `d_attendance`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE `d_attendance`.`student_course` (
  `id` INT NOT NULL,
  `studentid` INT NOT NULL,
  `courseid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk2_studentid_idx` (`studentid` ASC) VISIBLE,
  INDEX `fk2_courseid_idx` (`courseid` ASC) VISIBLE,
  CONSTRAINT `fk2_studentid`
    FOREIGN KEY (`studentid`)
    REFERENCES `d_attendance`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk2_courseid`
    FOREIGN KEY (`courseid`)
    REFERENCES `d_attendance`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);