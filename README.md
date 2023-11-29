# Conversation

## الوصف

هذه الحزمة توفر الواجهة البرمجية للتطبيقات للتعامل مع بيانات المحادثة باستخدام Redis.

## التثبيت

يمكن تثبيت الحزمة باستخدام Composer:


bash
composer require devrabie\Conversation

# الاستخدام

## استخدم الكلاس `Conversation` للتعامل مع بيانات المحادثة. فيما يلي بعض الأمثلة على كيفية استخدامه:

* للتحقق مما إذا كانت الأوامر موجودة لمعرف معين:
`$exists = Conversation::iS($id); `
* **  لتحديث الحالة والأوامر لمعرف معين:**
`Conversation::Update_is($id, $Command, $txt, $Status);`
* ** لإيقاف المحادثة لمعرف معين:**
`Conversation::stop($id);`

** للحصول على الأمر لمعرف معين:**

`$command = Conversation::getCommand($id);`
**5. للحصول على الحالة لمعرف معين:**

`$status = Conversation::getStatus($id);`
**6. للحصول على الملاحظات لمعرف معين:**

`$notes = Conversation::getnotes($id);`
7. لتحديث التفاصيل لمعرف وحالة معينة:

`Conversation::Updatedeta($txt, $id, $Status);`
8. للحصول على التفاصيل لمعرف وحالة معينة:

`$deta = Conversation::getdeta($Status, $id);`
9. للحصول على msid:

`$msid = Conversation::getmsid();`
10. لتحديث msid:

`Conversation::Updatemsid($id);`
11. للحصول على dbid:

`$dbid = Conversation::getdbid();`



## الترخيص

هذه الحزمة مرخصة تحت رخصة MIT.

