SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE `client`;
TRUNCATE TABLE `subscription_type`;
TRUNCATE TABLE `subscription`;
TRUNCATE TABLE `visit`;
SET FOREIGN_KEY_CHECKS=1;

-- client
INSERT INTO `client` (
	SELECT id, NULL, number, firstname, lastname, birth_date, email, phone FROM `gym-old`.member
);

-- subscription type
INSERT INTO `subscription_type` (
	SELECT
    id,
    title,
    description,
    price,
    duration,
	  CASE WHEN units = 'MONTHS' THEN 'M' ELSE 'D' END as duration_unit,
	  enter_time,
	  exit_time, visits_per_week
  FROM `gym-old`.subscription_type
);

-- subscription history
INSERT INTO `subscription` (
	SELECT s.id, s.type_id, s.price_on_signup, s.start_date, s.expire_date, s.member_id FROM `gym-old`.subscription s
);

-- visits
INSERT INTO visit (
	SELECT v.id, v.member_id, v.`day`, v.enter_time, v.exit_time FROM `gym-old`.visit v
);

-- active subscriptions link to client
UPDATE `client` c SET c.subscription_id = (
  SELECT id
  FROM `gym-old`.subscription s
  WHERE s.member_id = c.id AND s.status = 'ACTIVE'
);

-- cleaning data
UPDATE client SET phone = REPLACE(REPLACE(phone,'-', ''),'.', '');
UPDATE client SET phone = NULL WHERE LENGTH(phone) = 0;
UPDATE client SET email = NULL WHERE LENGTH(email) = 0;