/* Values */

CREATE TABLE `educational_level` (
  `level` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `beneficiary_type` (
	`id` INT PRIMARY KEY,
	`label` VARCHAR(25) NOT NULL
);

CREATE TABLE `accom_type` (
	`id` INT PRIMARY KEY,
	`label` VARCHAR(25) NOT NULL
);

CREATE TABLE `income_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `relation_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `health_status_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `social_status_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `phone_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(25) NOT NULL
);

CREATE TABLE `area_label` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(255) NOT NULL
);

CREATE TABLE `school` (
  `id` INT PRIMARY KEY,
  `label` VARCHAR(255) NOT NULL,
  `area_id` INT
);

/* Values Insertion */

INSERT INTO `educational_level` VALUES
	(1, 'أول ابتدائي'),
	(2, 'ثاني ابتدائي'),
	(3, 'ثالث ابتدائي'),
	(4, 'رابع ابتدائي'),
	(5, 'خامس ابتدائي'),
	(6, 'سادس ابتدائي'),
	(7, 'أول متوسط'),
	(8, 'ثاني متوسط'),
	(9, 'ثالث متوسط'),
	(10, 'أول ثانوي'),
	(11, 'ثاني ثانوي'),
	(12, 'ثالث ثانوي');

INSERT INTO `beneficiary_type` VALUES
	(1, 'ألف'),
	(2, 'باء'),
	(3, 'جيم');


INSERT INTO `accom_type` VALUES
	(1, 'ملك'),
	(2, 'أجار'),
	(3, 'ورثة'),
	(4, 'مشترك');
	(5, 'غير ذلك');

INSERT INTO `income_label` VALUES
	(1, 'تأمينات'),
	(2, 'الضمان'),
	(3, 'راتب'),
	(4, 'تقاعد'),
	(5, 'تأهيل معاقين'),
	(6, 'عقار'),
	(7, 'أخرى');

INSERT INTO `relation_label` VALUES
	(1, 'ابن'),
	(2, 'بنت'),
	(3, 'أخ'),
	(4, 'أخت'),
	(5, 'أب'),
	(6, 'أم'),
	(7, 'جد'),
	(8, 'جدة');

INSERT INTO `health_status_label` VALUES
	(1, 'سليم'),
	(2, 'مريض');

INSERT INTO `social_status_label` VALUES
	(1, 'متزوج'),
	(2, 'غير متزوج');

INSERT INTO `phone_label` VALUES
	(1, 'هاتف منزل'),
	(2, 'جوال'),
	(3, 'آخر');

INSERT INTO `area` VALUES
	(1, 'الرفاع'),
	(2, 'المعيزل'),
	(3, 'السلطانية'),
	(4, 'حصيمة'),
	(5, 'الصراة القديمة'),
	(6, 'الصراة الجديدة');

INSERT INTO `school` VALUES
	(1, 'مدرسة ١', NULL),
	(2, 'مدرسة ٢', NULL),
	(3, 'مدرسة ٣', NULL),
	(4, 'مدرسة ٤', NULL);

/* Entities */

CREATE TABLE `person` (
  `gov_id` VARCHAR(20) PRIMARY KEY,
  `full_name` VARCHAR(255),
  `gender` BOOLEAN,
  `birth_date` DATE
 );

CREATE TABLE `beneficiary` (
  `file_id` INT PRIMARY KEY,
  `gov_id` INT UNIQUE,
  `is_permanent` BOOLEAN,
  `job` VARCHAR(255),
  `job_location` VARCHAR(255),
  `update_date` DATE,
  `payment_date` DATE,
  `giving_amount` INT,
  `rent_value` INT,
  `family_members_count` INT,
  `alternative_contact_name` VARCHAR(255),
  `beneficiary_type_id` INT,
  `area_id` INT,
  `accom_type_id` INT ,
  `health_status_id` INT,
  `social_status_id` INT
);

CREATE TABLE `phone` (
  `gov_id` INT,
  `label_id` INT,
  `phone_number` VARCHAR(25),
  PRIMARY KEY (`gov_id`, `label_id`)
);

CREATE TABLE `income` (
  `amount` INT,
  `file_id` INT,
  `label_id` INT,
  PRIMARY KEY (`file_id`, `label_id`)
);

CREATE TABLE `dependency` (
  `id` INT PRIMARY KEY,
  `beneficiary_file_id` INT UNIQUE,
  `dependent_gov_id` INT UNIQUE,
  `educational_level` INT,
  `relation_id` INT
);
