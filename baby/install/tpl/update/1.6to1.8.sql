ALTER TABLE `th_attachments` ADD COLUMN `height` int(6) NOT NULL DEFAULT 0 AFTER `mime`;
ALTER TABLE `th_attachments` ADD COLUMN `width` int(6) NOT NULL DEFAULT 0 AFTER `height`;

