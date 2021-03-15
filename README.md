<div dir="rtl">
<h1> مسار تطبيق لتقييم الأماكن على الخرائط </h1>
<p>الشيفرة المصدرية الخاصة بمسار مسار تطبيق لتقييم الأماكن على الخرائط ضمن دورة "تطوير تطبيقات الويب باستخدام PHP" المقدمة من أكاديمية حسوب</p>

<div>
<a href="https://academy.hsoub.com/learn/php-web-application-development/">دورة تطوير تطبيقات الويب باستخدام PHP</a>
</div>

<h2> طريقة الإعداد </h2>
<ul>
<li>إنشاء الملف .env  وتعيين قيم الإتصال بقاعدة البيانات</li>

<li>composer install</li>

<li>php artisan migrate --seed</li>

<li>php artisan storage:link</li>

<li>php artisan key:generate</li>

<li>php artisan serve</li>
</ul>
<h2 dir="rtl"> ضبط الإعدادات لتجربة خاصية الإبلاغ </h2>
 

<p dir="rtl">قم بضبط الإعدادات في ملفenv بالشكل التالي:</p>

  <ul dir="rtl">

<li> سجل في الموقع https://mailtrap.io لمحاكاة إرسال البريد</li>

<li> انتقل إلى https://mailtrap.io/inboxes/ ثم Demo inbox</li>

<li> انسخ اسم المستخدم وكلمة المرور إلى ملف env ، لتصبح الإعدادات كالتالي:</li>

MAIL_USERNAME=اسم المستخدم

MAIL_PASSWORD= كلمة المرور

</ul>


<h2 dir="rtl"> لتجربة عملية إستعادة كلمة المرور</h2>
 <ul dir="rtl">
<li> 
عين عنوان بريد إلكتروني إلى MAIL_FROM_ADDRESS بداخل الملف .env
</li>

<li> 
MAIL_FROM_ADDRESS=admin@maps.test
 </li>
</ul>

</div>
