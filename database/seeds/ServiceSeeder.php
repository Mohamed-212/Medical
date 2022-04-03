<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Services::create([
            'name_ar' => 'تخطيط المعدات',
            'name_en' => 'Equipment Planning',
            'description_ar' => 'يعد تخطيط المعدات الطبية أمرًا بالغ الأهمية لتحقيق النجاح النهائي لكل من الإنشاءات الجديدة وتجديد مرافق الرعاية الصحية. تعمل منهجيات تخطيط المعدات التي أثبتت كفاءتها في AM Medical على تمكين المشاريع باستمرار من الانتهاء في الوقت المحدد وفي حدود الميزانية. سيتحقق موظفونا من أن الأصول قد تم تخصيصها بشكل صحيح مع الحد الأدنى من التعطيل للعمليات اليومية لمنشآتك. بالنظر إلى معدل التحسينات التكنولوجية في الأقسام التي تركز على المعدات مثل غرف العمليات والرعاية الحرجة والتصوير ، فإن عملية محددة بوضوح مقرونة بفريق تخطيط معدات مؤهل تأهيلا عاليا ضرورية للنجاح. عند العمل مع AM Medical ، يمكن أن يطمئن العميل إلى الميزانيات الدقيقة ، والمعدات ووظائف الغرفة ، وتوصيات صادقة وغير منحازة بشأن المعدات.',
            'description_en' => 'Medical equipment planning is crucial to the ultimate success of both new construction and renovation of healthcare facilities. AM Medical’s proven equipment planning methodologies consistently enable projects to finish on time and within budget. Our staff will verify that the assets are correctly allocated with a minimal disruption to your facilities daily operations. Given the rate of technological improvements in equipment-focused departments such as operating rooms, critical care and imaging, a clearly defined process coupled with a highly qualified equipment planning team is necessary for success. When working with AM Medical, the client can be assured of accurate budgets, equipment and room functionality, and honest unbiased equipment recommendations.',
        ]);
    }
}
