/*
 * CKFinder
 * ========
 * http://www.ckfinder.com
 * Copyright (C) 2007-2008 Frederico Caldeira Knabben (FredCK.com)
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 *
 * ---
 * English language file.
 */

var CKFLang =
{

Dir : 'ltr',
HelpLang : 'th',

// Date Format
//		d    : Day
//		dd   : Day (padding zero)
//		m    : Month
//		mm   : Month (padding zero)
//		yy   : Year (two digits)
//		yyyy : Year (four digits)
//		h    : Hour (12 hour clock)
//		hh   : Hour (12 hour clock, padding zero)
//		H    : Hour (24 hour clock)
//		HH   : Hour (24 hour clock, padding zero)
//		M    : Minute
//		MM   : Minute (padding zero)
//		a    : Firt char of AM/PM
//		aa   : AM/PM
DateTime : 'd/m/yyyy HH:MM',
DateAmPm : ['AM','PM'],

// Folders
FoldersTitle	: 'โฟลเดอร์',
FolderLoading	: 'กำลังโหลด...',
FolderNew		: 'กรุณาระบุชื่อโฟลเดอร์ใหม่ : ',
FolderRename	: 'กรุณาระบุชื่อโฟลเดอร์ที่ต้องการแก้ไขใหม่ : ',
FolderDelete	: 'คุณมั่นใจที่จะลบโฟลเดอร์  "%1"?',
FolderRenaming	: ' (กำลังเปลี่ยนชื่อไฟล์...)',
FolderDeleting	: ' (กำลังลบ...)',

// Files
FileRename		: 'กรุณาระบุชื่อไฟล์ใหม่ : ',
FileRenameExt	: 'คุณแน่ใจที่จะเปลี่ยนนามสกุลไฟล์หรือไม่ ? การเปลี่ยนครั้งนี้อาจมีผลให้ใช้งานไฟล์นี้ไม่ได้',
FileRenaming	: 'กำลังเปลี่ยนชื่อ...',
FileDelete		: 'คุณแน่ใจว่าจะลบไฟล์ชื่อ "%1"?',

// Toolbar Buttons (some used elsewhere)
Upload		: 'อัพโหลด',
UploadTip	: 'อัพโหลดไฟล์ใหม่',
Refresh		: 'เรียกหน้านี้ใหม่ (Refresh)',
Settings	: 'ปรับแต่งค่า',
Help		: 'ความช่วยเหลือ',
HelpTip		: 'ทิป ช่วยเหลือ',

// Context Menus
Select		: 'เลือกไฟล์นี้',
View		: 'เรียกดูไฟล์นี้',
Download	: 'ดาวน์โหลด',

NewSubFolder	: 'สร้าง Subfolder ใหม่',
Rename			: 'เปลี่ยนชื่อ',
Delete			: 'ลบ',

// Generic
OkBtn		: 'ตกลง',
CancelBtn	: 'ยกเลิก',
CloseBtn	: 'ปิด',

// Upload Panel
UploadTitle			: 'อัพโหลดไฟล์ใหม่',
UploadSelectLbl		: 'เลือกไฟล์ที่ต้องการ upload',
UploadProgressLbl	: '(กำลังอัพโหลด รอสักครู่...)',
UploadBtn			: 'อัพโหลดไฟล์ที่เลือกนี้',

UploadNoFileMsg		: 'โปรดเลือกไฟล์บนคอมพิวเตอร์ของคุณ',

// Settings Panel
SetTitle		: 'ปรับแต่ง',
SetView			: 'เข้าชม:',
SetViewThumb	: 'ภาพย่อ (thumbnail)',
SetViewList		: 'รายการ',
SetDisplay		: 'ส่วนแสดง (display):',
SetDisplayName	: 'ชื่อไฟล์',
SetDisplayDate	: 'วันที่',
SetDisplaySize	: 'ขนาดไฟล์',
SetSort			: 'เรียงลำดับ:',
SetSortName		: 'ด้วยชื่อไฟล์',
SetSortDate		: 'ด้วยวันที่',
SetSortSize		: 'ด้วยขนาดไฟล์',

// Status Bar
FilesCountEmpty : '<โฟลเดอร์นี้ว่างเปล่า>',
FilesCountOne	: '1 ไฟล์',
FilesCountMany	: '%1 ไฟล์',

// Connector Error Messages.
ErrorUnknown : 'ไม่สามารถดำเนินการตามที่ท่านต้องการได้. (Error %1)',
Errors : 
{
 10 : 'คำสั่งผิดพลาด.',
 11 : 'ไฟล์ที่ท่านเลือกมีชนิดของไฟล์ไม่ตรงกับที่ท่านระบุไว้.',
 12 : 'ไม่มีชนิดไฟล์ที่ท่านเลือก',
102 : 'ชื่อไฟล์หรือโฟลเดอร์ไม่ถูกต้อง (ควรตั้งเป็นภาษาอังกฤษ)',
103 : 'การดำเนินการยังไม่เสร็จสมบูรณ์ เนื่องจากท่านได้รับอนุญาตในส่วนนี้...(เกี่ยวกับความเป็นเจ้าของ)',
104 : 'การดำเนินการยังไม่เสร็จสมบูรณ์ เนื่องจากท่านได้รับอนุญาตในส่วนนี้...(เกี่ยวกับระดับการใช้งาน)',
105 : 'ไม่รู้จักไฟล์ดังกล่าว',
109 : 'เลือกการใช้งานไม่ถูกต้อง',
110 : 'ไม่สามารถระบุสาเหตุความผิดพลาดได้',
115 : 'ไฟล์หรือโฟลเดอร์นี้มีอยู่แล้ว',
116 : 'ไม่พบโฟลเดอร์ดังกล่าวนี้แล้ว โปรดลองใหม่อีกครั้ง',
117 : 'ไม่พบไฟล์ดังกล่าว โปรดทดลองเรียกรายการไฟล์อีกครั้ง',
201 : 'ไฟล์ดังกล่าวมีอยู่ในระบบแล้ว ระบบจะทำการเปลี่ยนชื่อไฟล์เป็นดังนี้ "%1"',
202 : 'ไฟล์ไม่ถูกต้อง',
203 : 'ขนาดไฟล์ใหญ่เกินไป',
204 : 'การอัพโหลดไฟล์ถูกขัดขวาง',
205 : 'ไม่สามารถอัพโหลดไฟล์ไปยัง server ได้ ชั่วคราว',
206 : 'ไม่สามารถอัพโหลดไฟล์ดังกล่าวได้ เนื่องจากไฟล์ดังกล่าวอาจมีส่วนที่เป็นไฟล์ html',
500 : 'หน้าต่างนี้ถูกระงับการแสดงผล เพื่อความปลอดภัยบางประการ หรือไม่ โปรดตรวจสอบการ config ของ CKFinder',
501 : 'การสร้่างภาพย่อถูกระงับไว้'
},

// Other Error Messages.
ErrorMsg :
{
FileEmpty		: 'ต้องระบุชื่อไฟล์ ห้ามมีค่าว่าง',
FolderEmpty		: 'ต้องระบุชื่อโฟลเดอร์ ห้ามมีค่าว่าง',

FileInvChar		: 'การตั้งชื่อไฟล์ห้ามใช้อักขระดังต่อไปนี้ : \n\\ / : * ? " < > |',
FolderInvChar	: 'การตั้งชื่อโฟลเดอร์ห้ามใช้อักขระดังต่อไปนี้ : \n\\ / : * ? " < > |',

PopupBlockView	: 'ไม่สามารถเปิดหน้าต่างใหม่ได้ เพราะมีการป้องการการเปิด popup บน browser นี้'
}

} ;
